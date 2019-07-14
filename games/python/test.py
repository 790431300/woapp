#!/usr/bin/env python
# -*- coding: utf-8 -*-
import socket
udp_socket = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
udp_socket.sendto(b"\n hello \n", ("192.168.43.1",7788))
udp_socket.close()
print ("测试");