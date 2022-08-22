import random
from datetime import time

import requests
import re


def postCheck(url,makeKey):
    post_data = {
        'contacts': 'checkkkkkkkk',
        'mobile': '1101008611123',
        'content': makeKey
    }
    response = requests.post(url, data=post_data)
    if response.status_code == 200:
        return True
    else:
        return False


def getKey():
    r = requests.get("http://127.0.0.1/?gbook/")
    if r.status_code==200:
        flagg = re.findall(r'''keyyyy-(.+?)-keyyyy''', r.text)
        return "keyyyy-"+flagg[0]+"-keyyyy"
    else:
        return "err"
def makeKey():
    random.seed(time)
    alp = 'abcdefghijklmnopqrstuvwxyz'
    key = random.sample(alp,10)
    key="keyyyy-"+"".join(key)+"-keyyyy"
    return key

if __name__ == '__main__':
    url = "http://127.0.0.1/?message/"
    mkey=makeKey()
    if postCheck(url,mkey):
        if mkey==getKey():
            print("Check Up")
        else:
            print("Check Down")
    else:
        print("Check Down")