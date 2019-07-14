import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
port.write("AT+CMGF=1\r");
port.write("AT+CMGS=\"17689966676\"\r\n");
port.write("Ehfdhhf");
