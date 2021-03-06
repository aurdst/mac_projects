import pygame
import random
import animation

class Monster(animation.AnimateSprite):

    def __init__(self, game, name, size, offset=0):
        super().__init__(name, size)
        self.game = game
        self.health = 100
        self.max_health = 100
        self.attack = 0.2
        self.rect = self.image.get_rect()
        self.rect.x = 1000 + random.randint(20, 300)
        self.rect.y = 540 - offset
        self.start_animation()
        self.loot_amount = 10

    def set_speed(self, speed):
        self.default_speed = speed
        self.velocity = random.randint(1, 2)

    def set_loot_amount(self, amount):
        self.loot_amount = amount

    def damage(self, amount):
        #take a damage
        self.health -= amount

        if self.health <= 0:
            #spawn a new monsters
            self.rect.x = 1000 + random.randint(20,300)
            self.velocity = random.randint(1, self.default_speed)
            self.health = self.max_health
            #add score
            self.game.add_score(self.loot_amount)

            #if the event bar is load
            if self.game.comet_event.is_full_loaded():
                #delete of the game
                 self.game.all_monsters.remove(self)

                # call the method for cometfall
                 self.game.comet_event.attempt_fall()

    def remove(self):
        self.game.all_monsters.remove(self)

    def update_animation(self):
        self.animate(loop=True)

    def update_health_bar(self, surface):
        pygame.draw.rect(surface, (60 ,60 ,60), [self.rect.x + 10, self.rect.y - 20, self.max_health, 5])
        pygame.draw.rect(surface, (111, 210, 46), [self.rect.x + 10, self.rect.y - 20, self.health, 5])

    def forward(self):
        #he move only if he can with a player's group
        if not self.game.check_collision(self, self.game.all_players):
            self.rect.x -= self.velocity

            if self.rect.x < -280 and self.game.comet_event.is_full_loaded():
                self.remove()
                print('delete')

                # call the method for cometfall
                self.game.comet_event.attempt_fall()
        else:
            #take a damage
            self.game.player.damage(self.attack)


#class for the mummy
class Mummy(Monster):

    def __init__(self, game):
        super().__init__(game, 'mummy', (130, 130))
        self.set_speed(3)
        self.set_loot_amount(20)


class Alien(Monster):

    def __init__(self, game):
        super().__init__(game, 'alien', (300, 300), 140)
        self.health = 250
        self.max_health = 250
        self.set_speed(1)
        self.attack = 0.8
        self.set_loot_amount(50)


