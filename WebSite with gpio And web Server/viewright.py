#!/usr/bin/python3
import RPi.GPIO as GPIO


GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

GPIO.setup(16,GPIO.OUT)
GPIO.setup(20,GPIO.OUT)
GPIO.setup(21,GPIO.OUT)
GPIO.setup(26,GPIO.OUT)


GPIO.output(16,GPIO.HIGH)
GPIO.output(20,GPIO.LOW)
GPIO.output(21,GPIO.HIGH)
GPIO.output(29,GPIO.HIGH)
print("view Right")

