import pygame

class SoundManager:

    def __init__(self):
        self.sounds = {
            'click': pygame.mixer.Sound('assets/sounds/click.ogg'),
            'game_over': pygame.mixer.Sound('assets/sounds/game_over.ogg'),
            'meteorite': pygame.mixer.Sound('assets/sounds/meteorite.ogg'),
            'shoot': pygame.mixer.Sound('assets/sounds/tir.ogg'),
            'game_sound': pygame.mixer.Sound('assets/sounds/game_sound.ogg')
        }

    def play(self, name, loop):
        self.sounds[name].play(loop)

    def stop(self, name):
        self.sounds[name].stop()