import pygame
from game import Game
from player import Player
import math

pygame.init()

present = pygame.image.load('assets/present.jpg')
present = pygame.transform.scale(present, (1080, 720))

#sound_img = pygame.image.load('assets/')
#sound_img = pygame.transform.scale(sound_img, (50, 50))

# difined clock
clock = pygame.time.Clock

# Window of the game
pygame.display.set_caption("Conquest Heroes")
screen = pygame.display.set_mode((1080, 720))

# import the background
background = pygame.image.load('assets/bg.jpg')
background = pygame.transform.scale(background, (1080, 720))
banner = pygame.image.load('assets/banner.png')
banner = pygame.transform.scale(banner, (650, 400))
banner_rect = banner.get_rect()
banner_rect.x = math.ceil(screen.get_width() / 4.5)

tuto = pygame.image.load('assets/tuto.png')
tuto = pygame.transform.scale(tuto, (400, 220))
tuto_rect = tuto.get_rect()
tuto_rect.y = math.ceil(screen.get_width() + 200)

play_button = pygame.image.load('assets/button.png')
play_button = pygame.transform.scale(play_button, (150, 150))
play_button_rect = play_button.get_rect()
play_button_rect.x = math.ceil(screen.get_width() / 2.5)
play_button_rect.y = math.ceil(screen.get_height() / 2.5)
# import the background
game = Game()

running = True

# Boucle when the runing is true
while running:

    screen.blit(present, (0, 0))
    # apply the background
    screen.blit(background, (0, 0))
   # screen.blit(sound_img, (0, 0))

    # the play is on or not ?
    if game.is_playing:
        game.update(screen)
    else:
        screen.blit(play_button, (450,350))
        screen.blit(banner, (240,-100))
        screen.blit(tuto, (340, 500))

    # update screen
    pygame.display.flip()

    # If the player close the window
    for event in pygame.event.get():
        # verify event is closed
        if event.type == pygame.QUIT:
            running = False
            pygame.quit()
            print('The game is closed')

        # detect if the player keydown
        elif event.type == pygame.KEYDOWN:
            # what key?
            game.pressed[event.key] = True
            #Enter Key
            if event.key == pygame.K_RETURN:
                game.start()
                game.sound_manager.play('click', 0)

        elif event.type == pygame.KEYUP:
            game.pressed[event.key] = False

        elif event.type == pygame.MOUSEBUTTONDOWN:
             game.player.launch_projectile()

clock.tick(60)
