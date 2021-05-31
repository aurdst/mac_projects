import pygame


#defined one class for the animation
class AnimateSprite(pygame.sprite.Sprite):

    #defined the stapes in animation
    def __init__(self, sprite_name, size=(200, 200)):
        super().__init__()
        self.size = size
        self.image = pygame.image.load(f'assets/{sprite_name}.png')
        self.image = pygame.transform.scale(self.image, size)
        self.current_image = 0 #for start animation at 0
        self.images = animation.get(sprite_name)
        self.animation = False

    #difined the method for start animation
    def start_animation(self):
        self.animation = True

    #defined one ethod for animate the sprite
    def animate(self, loop=False):

        #verif if animation is on
        if self.animation:
            #pass to the next sprite
            self.current_image += 1

            #verify if animation is finished
            if self.current_image >= len(self.images):
                #remake animation of the start
                self.current_image = 0

                #verify if loop is on
                if loop is False:

                    #deactivation of the anim
                    self.animation = False

            #modify last image by the new
            self.image = self.images[self.current_image]
            self.image = pygame.transform.scale(self.image, self.size)


#defined one function for load image of the sprite
def load_animation_images(sprite_name):
    #load all frames (sprites)
    images = []
    #recuperate road to file of the sprites
    path = f"assets/{sprite_name}/{sprite_name}"

    #boucle on the images in the file
    for num in range (1,3):
        image_path = path + str(num) + '.png'
        images.append(pygame.image.load(image_path))

    #send the content of the list images
    return images


#defined one dict which will contain all images loaded
#mumy -> [..mummy1.png, ...]
animation = {
    'mummy': load_animation_images('mummy'),
    'player': load_animation_images('player'),
    'alien': load_animation_images('alien'),
    'projectile': load_animation_images('projectile'),
    'comet': load_animation_images('comet')
}