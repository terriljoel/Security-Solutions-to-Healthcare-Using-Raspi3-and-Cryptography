import dec123
import sys

print(dec123.decryption123("888888888888","12-09-1999","Harish","06f3"))
del sys.modules["dec123"]
import dec123
print(dec123.decryption123("888888888888","12-09-1999","Harish","6ddd"))