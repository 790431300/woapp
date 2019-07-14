
import serial
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0);
port.write("ATH\r\n")
port.timeout=3;
print(port.readlines());
