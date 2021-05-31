import pygame
from comet import Comet

#create a class event
class CometFallEvent:

    #when the game charge, create a count bar
    def __init__(self, game):
        self.percent = 0
        self.percent_speed = 15
        self.game = game
        self.fall_mode = False

        #defined the group of the comet
        self.all_comets = pygame.sprite.Group()

    def add_percent(self):
        self.percent += self.percent_speed / 100

    def is_full_loaded(self):
        return self.percent >= 100

    def reset_percent(self):
        self.percent = 0

    def meteor_fall(self):
        #boucle for, for fall comet
        for i in range(20,30):
            #show the first fireball
            self.all_comets.add(Comet(self))

    def attempt_fall(self):
        #if the bar event is full
        if self.is_full_loaded() and len(self.game.all_monsters) == 0:
            print('WARNING COMETFALL')
            self.meteor_fall()
            self.fall_mode = True #actived event

    def update_bar(self, surface):

        #add pourcent
        self.add_percent()

        #blackbar in the background
        pygame.draw.rect(surface, (0, 0, 0), [
            0, #Axe of X
            surface.get_height() - 20,# Axe of y
            surface.get_width(),# width of window
            10 # thickness of the bar
        ])
        #barcolor for bar event
        pygame.draw.rect(surface, (187, 11, 11), [
            0,  # Axe of X
            surface.get_height() - 20,  # Axe of y
            (surface.get_width() / 100) * self.percent,  # width of window
            10  # thickness of the bar
        ])