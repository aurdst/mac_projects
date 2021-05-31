import pygame
from projectile import Projectile
import animation
from pprint import pprint
import threading


#create class for the player
class Player(animation.AnimateSprite):

    def __init__(self, game):
        super().__init__('player')
        self.game = game
        self.health = 100
        self.max_health = 100
        self.attack = 15
        self.velocity = 3
        self.all_projectile = pygame.sprite.Group()
        self.rect = self.image.get_rect()
        self.rect.x = 200
        self.rect.y = 500


    def damage(self, amount):
        if self.health - amount > amount:
            self.health -= amount
        else:
            self.game.game_over()

    def update_animation(self):
        self.animate()

    def update_health_bar(self, surface):
        pygame.draw.rect(surface, (60, 60, 60), [self.rect.x + 50, self.rect.y + 10, self.max_health, 5])
        pygame.draw.rect(surface, (158, 157, 255), [self.rect.x + 50, self.rect.y + 10, self.health, 5])

    def launch_projectile(self):
        self.all_projectile.add(Projectile(self))
        #start animation
        self.start_animation()
        #play sounds
        self.game.sound_manager.play('shoot', 0)

    def move_right(self):
        #if the player don't take monster
        if not self.game.check_collision(self, self.game.all_monsters):
            self.rect.x += self.velocity

    def move_left(self):
            self.rect.x -= self.velocity

    def jump_down(self):
        pprint(self.rect.y)
        self.rect.y += 8

    def jump_up(self):
        pprint(self.rect.y)
        self.rect.y -= 8
        self.rect.x += 2




