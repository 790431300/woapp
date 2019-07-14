
import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
port.write("AT+CMGR=1\r");
port.timeout=3;
text=port.readlines();
print(text[2]);
