#!usr/bin/env 
import pexpect 
import time
import sys 
 
if len(sys.argv) < 3:
	sys.stdout.write('0')
	#print("use: " + sys.argv[0] + " <contacto> <mensaje> [<messajeX>]") 
else:
	contacto = sys.argv[1]
	#mensage = sys.argv[2]
	telegram = pexpect.spawn('/home/asanchez/telegram/tg/bin/telegram-cli -k /home/asanchez/telegram/tg/tg-server.pub')
	#fout = open('mylog.txt', 'wb')
	#telegram.logfile = fout
	#sys.stdout.write('.')
	telegram.expect('>', timeout=1)
	#sys.stdout.write('1')
	time.sleep(1)
	#sys.stdout.write('.')
	telegram.sendline('dialog_list')
	telegram.expect('>', timeout=1)
	time.sleep(1)
	for i in range (2,len(sys.argv)): 
		telegram.sendline("msg "+contacto+" "+sys.argv[i])
		telegram.expect('>', timeout=2)
		time.sleep(2) 
	telegram.sendline('quit')
	sys.stdout.write('0')

