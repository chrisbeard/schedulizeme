import os
import sys
for x in range(10000, 30000):
    try:
        f = open(str(x)+'.json')
        if f.read() == '[]':
            os.remove(str(x)+'.json')
    except:
        pass
