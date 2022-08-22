import requests
from bs4 import BeautifulSoup


def GetSearchState(keyword,flag):
    r = requests.get("http://127.0.0.1/?keyword=" + keyword)
    r.encoding = 'utf-8'
    soup = BeautifulSoup(r.text, "html.parser")
    if(flag==0):
        item = soup.find("div", "text-center my-5 text-secondary")
        if(item==None):
            return False
        if(item.text=="未搜索到任何数据！"):
            return True
        else:
            return False
    elif(flag==1):
        item = soup.find("div", "col-12 col-sm-6 col-lg-3")
        if(item!=None):
            return True
        else:
            return False
if __name__ == '__main__':
    keywords = {
        "企业":1,
        "4444444":0,
        "网站":1
    }
    
    for i in keywords:
        if(GetSearchState(i,keywords[i])==False):
            flag=0
            break
        else:
            flag=1
    if(flag==0):
        print("Check Down")
    else:
        print("Check Up")
