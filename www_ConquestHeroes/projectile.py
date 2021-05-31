import pygame
import animation

class Projectile(animation.AnimateSprite):

    def __init__(self, player):
        super().__init__('projectile', (80, 80))
        self.velocity = 5
        self.player = player
        self.image = pygame.image.load('assets/projectile.png')
        self.image = pygame.transform.scale(self.image, (80, 80))
        self.rect = self.image.get_rect()
        self.rect.x = player.rect.x + 130
        self.rect.y = player.rect.y + 85
        self.origin_image = self.image
        self.angle = 0
        self.start_animation()

    def update_animation(self):
        self.animate(loop=True)

    def rotate(self):
        self.angle -= 0
        self.image = pygame.transform.rotozoom(self.origin_image, self.angle, 1)
        self.rect = self.image.get_rect(center=self.rect.center)

    def remove(self):
        self.player.all_projectile.remove(self)

    def move(self):
        self.rect.x += self.velocity

        #verify if the projectile meet a monster
        for monster in self.player.game.check_collision(self, self.player.game.all_monsters):
            #delete a rojectile
            self.remove()
            monster.damage(self.player.attack)

         #verify project if is on the screen
        if self.rect.x > 1080:
            self.remove()

