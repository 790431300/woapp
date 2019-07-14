
import serial
port = serial.Serial("/dev/ttyUSB0",baudrate=115200, timeout=3.0);
port.write("AT+CMGL=1\r");
port.timeout=0.1;
text=port.readlines();
x=2;
for i in range(0,200):
 y=x+3;
 x=y;
 print(str(text[x])+",");
