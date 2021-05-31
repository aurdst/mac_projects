import pygame
from player import Player
from monster import Mummy, Alien
from comet_event import CometFallEvent
from sounds import SoundManager


# create class game
class Game:

    def __init__(self):
        # defined if the game is start or not
        self.is_playing = False
        # generation of the player
        self.all_players = pygame.sprite.Group()
        self.player = Player(self)
        self.all_players.add(self.player)
        # generation of event
        self.comet_event = CometFallEvent(self)
        # group of monsters
        self.all_monsters = pygame.sprite.Group()
        self.sound_manager = SoundManager()
        # init score
        self.score = 0
        self.font = pygame.font.SysFont("monospace", 16)
        self.pressed = {}

    def start(self):
        self.is_playing = True
        self.spawn_monster(Mummy)
        self.spawn_monster(Mummy)
        self.spawn_monster(Mummy)
        self.sound_manager.play('game_sound', 10)

    def add_score(self, points=10):
        self.score += points

    def game_over(self):
        self.all_monsters = pygame.sprite.Group()
        self.comet_event.all_comets = pygame.sprite.Group()
        self.player.health = self.player.max_health
        self.comet_event.reset_percent()
        self.is_playing = False
        self.score = 0
        self.sound_manager.play('game_over', 0)
        self.sound_manager.stop('game_sound')

    def update(self, screen):

        # show the score on the screen
        score_text = self.font.render(f'Score : {self.score}', 1, (255, 255, 255))
        screen.blit(score_text, (20, 20))

        # apply the img of the player
        screen.blit(self.player.image, self.player.rect)

        self.player.update_health_bar(screen)

        # updated the event bar
        self.comet_event.update_bar(screen)

        # actualy animation of player
        self.player.update_animation()

        # recover projectiles of player
        for projectile in self.player.all_projectile:
            projectile.move()
            projectile.update_animation()

        # recover monster in game
        for monster in self.all_monsters:
            monster.update_health_bar(screen)
            monster.forward()
            monster.update_animation()

        # recover a comet
        for comet in self.comet_event.all_comets:
            comet.fall()
            comet.update_animation()

        # apply the group of the projectile (images)
        self.player.all_projectile.draw(screen)

        # apply the group of monsters (images)
        self.all_monsters.draw(screen)

        # apply the group of comet (images)
        self.comet_event.all_comets.draw(screen)

        # verify if the player move
        if self.pressed.get(pygame.K_d) and self.player.rect.x + self.player.rect.width < screen.get_width():
            self.player.move_right()

        elif self.pressed.get(pygame.K_q) and self.player.rect.x > 0:
            self.player.move_left()

        elif self.pressed.get(pygame.K_SPACE) and self.player.rect.y > 0:
            self.player.jump_up()

        elif self.pressed.get(pygame.K_SPACE) and self.player.rect.y >= 600:
            self.player.jump_down()

    def check_collision(self, sprite, group):
        return pygame.sprite.spritecollide(sprite, group, False, pygame.sprite.collide_mask)

    def spawn_monster(self, monster_class_name):
        self.all_monsters.add(monster_class_name.__call__(self))
