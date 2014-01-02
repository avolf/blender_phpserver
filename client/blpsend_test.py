# coding: utf-8
# execfile( "blpsend_test.py")
from blphttp import blphttp

filename = 'C:/Users/avolf/Desktop/ATEST.TXT'
data={'somedate':1888,'myval':"alex",'id':"1"};
files={'jobfile':filename}

httpi=blphttp()
httpi.data=data
httpi.files=files
httpi.server="localhost"
httpi.serverurl="/server/clientcomm.php"

httpi.send()

# print "\n\n"
# print "----- headers ---\n"
# print httpi.headers
# print "----- body ------\n"
# print httpi.body
# print "-----\n"

f = open("output.html","w")
f.write(httpi.response)
f.close()

print httpi.response