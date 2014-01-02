# coding: utf-8

import httplib, urllib

class blphttp:
	def __init__(self):
		self.data=[]
		self.files=[]
		self.body=''
		self.headers=''
		self.response=''
		self.server=''
		self.serverurl=''
		self.boundary='BLP2PHP5SERVERok46o84ap6564o7891s56BOUND'
		self.sp='\r\n'
	
	def send(self):
		[self.body,self.headers]=self.blp_get_encoded (self.data, self.files)

		comm = httplib.HTTPConnection(self.server)
		comm.request("POST",self.serverurl, self.body, self.headers)
		response_comm = comm.getresponse()
		self.response = response_comm.read()
		comm.close()

	def blp_get_encoded_data (self, data_name):
		return ('--' + self.boundary + self.sp
				+ 'Content-Disposition: form-data; name="%s"' % data_name + self.sp
				+ '' + self.sp
				+ str (self.data [data_name]) + self.sp)

	def blp_get_encoded_file (self, file_name):
		filepath = self.files [file_name]
		return ('--' + self.boundary  + self.sp
				+'Content-Disposition: form-data; name="%s"; filename="%s"' % (file_name, filepath) + self.sp
				+'Content-Type: application/octet-stream' + self.sp
				+'' + self.sp
				+ open (filepath, 'rb').read () + self.sp)

	def blp_get_encoded (self, data, files):
		body=""

		for name in data:
			body+=self.blp_get_encoded_data(name)
		for name in files:
			body+=self.blp_get_encoded_file(name)
		body+='--%s--' % self.boundary + self.sp
		headers={'content-type': 'multipart/form-data; boundary=' + self.boundary,
		'content-length': str (len (body))}
		
		return body, headers
	