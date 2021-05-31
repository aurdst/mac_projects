import pygame
import random
from monster import Mummy, Alien
import animation

#create a class for the comet
class Comet(animation.AnimateSprite):

    def __init__(self, comet_event):
        super().__init__('comet', (120, 120))
        #defined the img of the comet
        self.image = pygame.image.load('assets/comet.png')
        self.rect = self.image.get_rect()
        self.velocity = random.randint(2, 4)
        self.rect.x = random.randint(20, 800)
        self.rect.y = -random.randint(0, 800)
        self.comet_event = comet_event
        self.start_animation()

    def remove(self):
        self.comet_event.all_comets.remove(self)
        #play sounds
        self.comet_event.game.sound_manager.play('meteorite',0)

        #if comet = 0
        if len(self.comet_event.all_comets) == 0:
            print('end of event')
            #reset percent
            self.comet_event.reset_percent()
            self.comet_event.game.spawn_monster(Mummy)
            self.comet_event.game.spawn_monster(Alien)

    def update_animation(self):
        self.animate(loop=True)

    def fall(self):
        self.rect.y += self.velocity

        #if she not fall on the ground
        if self.rect.y >= 500:
            print('sol')
            #delet comet
            self.remove()

            #if there no more
            if len(self.comet_event.all_comets) == 0:
                print('Event is finish')
                #reset percent
                self.comet_event.reset_percent()
                self.comet_event.fall_mode = False

        #verify if the comet touch the player
        if self.comet_event.game.check_collision(
            self, self.comet_event.game.all_players
        ):
            print('player touched')
            #delete the comet
            self.remove()
            #undergo 20 damage
            self.comet_event.game.player.damage(20)


