
  // Motor Pin
int sterilizer =2 ;
int cleanmotor =3;
int IN1=4;              // input 1 for motor 1
int IN2=5 ;            // input 2 for motor 1
int IN3=6;           // input 1 for motor 2
int IN4=7;          // input 2 for motor 2
 // raspberry pi digitalRead(pin2)
int pin1=8;              // input pi 1 
int pin2=9 ;            // input pi 2 
int pin3=10;           // input pi 3 
int pin4=11;          // input pi 4 


//ultrasonic
#define trigrPin A0
#define echorPin A1
long durationr, distancer;


#define trigmPin A2
#define echomPin A3
long durationm, distancem;

#define triglPin A6
#define echolPin A7
long durationl, distancel;

//I2C LCD
#include <Wire.h> 
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27,16,2);  // set the LCD address to 0x27 for a 16 chars and 2 line display


void setup() {
  pinMode (cleanmotor,OUTPUT);
  pinMode (sterilizer,OUTPUT);
  
  pinMode (IN1,OUTPUT);
  pinMode (IN2,OUTPUT);
  pinMode (IN3,OUTPUT);
  pinMode (IN4,OUTPUT);

  pinMode (digitalRead(pin1),INPUT);
  pinMode (digitalRead(pin2),INPUT);
  pinMode (digitalRead(pin3),INPUT);
  pinMode (digitalRead(pin4),INPUT);

  pinMode(trigrPin, OUTPUT);
  pinMode(echorPin, INPUT);
  pinMode(trigmPin, OUTPUT);
  pinMode(echomPin, INPUT);
  pinMode(triglPin, OUTPUT);
  pinMode(echolPin, INPUT);


  lcd.init();                      // initialize the lcd 
  lcd.init();
  // Print a message to the LCD.
  lcd.backlight();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");

  
  Serial.begin(9600);  //To Test on Serial Monitor 

}

void loop() {
  ultral();
  ultram();
  ultrar();
  if(digitalRead(pin1) == LOW && digitalRead(pin2) == LOW && digitalRead(pin3) == LOW && digitalRead(pin4) == LOW ){
    //All Stop
     stoop();
     Serial.println("Stop All");
     
     
  }
  else if(digitalRead(pin1) == LOW && digitalRead(pin2) == LOW && digitalRead(pin3) == LOW && digitalRead(pin4) == HIGH  ){
    // forward 
    if (distancel =<50 || distancem =<50 || distancer =<50){
    forward ();
    }
    else{
      lcd.clear();
      lcd.setCursor(3,0);
      lcd.print("Object Detect!");
      lcd.setCursor(1,1);
      lcd.print("Stop");
      delay(200);
      stoop();
      delay(500);
      right();
      delay(500);
    }
    
  }
  else if(digitalRead(pin1) == LOW && digitalRead(pin2) == LOW && digitalRead(pin3) == HIGH && digitalRead(pin4) == LOW ){
    // right
    right();
    
  }
  else if(digitalRead(pin1) == LOW && digitalRead(pin2) == LOW && digitalRead(pin3) == HIGH && digitalRead(pin4) == HIGH  ){
    //left
    left();
    
  }
   else if(digitalRead(pin1) == LOW && digitalRead(pin2) == HIGH && digitalRead(pin3) == LOW && digitalRead(pin4) == LOW  ){
    //Back
    back();
    
  }
  
  else if(digitalRead(pin1) == LOW && digitalRead(pin2) == HIGH && digitalRead(pin3) == LOW && digitalRead(pin4) == HIGH  ){
    //Keep Forward
    forward ();
    
  }
  else if(digitalRead(pin1) == LOW && digitalRead(pin2) == HIGH && digitalRead(pin3) == HIGH && digitalRead(pin4) == LOW  ){
    //Start clean
    digitalWrite (cleanmotor,LOW);
    Serial.println("Sart Clean");
    
    
  }
  else if(digitalRead(pin1) == LOW && digitalRead(pin2) == HIGH && digitalRead(pin3) == HIGH && digitalRead(pin4) == HIGH  ){
    //Stop clean
    digitalWrite (cleanmotor,HIGH);
    Serial.println("Stop Clean");
    
  }
  else if(digitalRead(pin1) == HIGH && digitalRead(pin2) == LOW && digitalRead(pin3) == LOW && digitalRead(pin4) == LOW ){
    //sterilizer Start
    digitalWrite (sterilizer,HIGH);
    Serial.println("Sart sterilizer");
    
  }
  else if(digitalRead(pin1) == HIGH && digitalRead(pin2) == LOW && digitalRead(pin3) == LOW && digitalRead(pin4) == HIGH  ){
    //All Stop
    stoop();
    
  }
  else if(digitalRead(pin1) == HIGH && digitalRead(pin2) == LOW && digitalRead(pin3) == HIGH && digitalRead(pin4) == LOW ){
    //Turn Right
    turnright();
    
  }
  else if(digitalRead(pin1) == HIGH && digitalRead(pin2) == LOW && digitalRead(pin3) == HIGH && digitalRead(pin4) == HIGH  ){
    //turn left
    turnleft();
   
    
  }
 
  else{
    //All Stop
     stoop();
     Serial.println("Stop no data");
     lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  
  }
delay(500);

}

void forward ()
{
  digitalWrite (IN1,LOW);
  digitalWrite (IN2,HIGH);
  digitalWrite (IN3,LOW);
  digitalWrite (IN4,HIGH);
  Serial.println("F");
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  lcd.setCursor(3,1);
  lcd.print("Forward");
  delay(200);
  
}

  //robot Move Right function
  void right()
{
  digitalWrite (IN1,LOW);
  digitalWrite (IN2,HIGH);
  digitalWrite (IN3,HIGH);
  digitalWrite (IN4,HIGH);
  Serial.println("R");
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  lcd.setCursor(3,1);
  lcd.print("Right");
  delay(200);
  
}

  //robot Move Left function
  void left()
{
  digitalWrite(IN1,HIGH);
  digitalWrite(IN2,HIGH);
  digitalWrite(IN3,LOW);
  digitalWrite(IN4,HIGH);
  Serial.println("L");
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  lcd.setCursor(3,1);
  lcd.print("Left");
  delay(200);
  
}

  //robot move back function
 void back()
{ 
  digitalWrite(IN1,HIGH);
  digitalWrite(IN2,LOW);
  digitalWrite(IN3,HIGH);
  digitalWrite(IN4,LOW);
  Serial.println("back"); 
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  lcd.setCursor(3,1);
  lcd.print("Back");
  delay(200);
  
} 

  //robot Stop function
  void stoop(){
  digitalWrite(IN1,HIGH);
  digitalWrite(IN2,HIGH);
  digitalWrite(IN3,HIGH);
  digitalWrite(IN4,HIGH); 
  digitalWrite (cleanmotor,HIGH);
  digitalWrite (sterilizer,LOW);
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  lcd.setCursor(1,1);
  lcd.print("Stop All");
  delay(200);
   
}
  void turnright()
{
  digitalWrite (IN1,LOW);
  digitalWrite (IN2,HIGH);
  digitalWrite (IN3,HIGH);
  digitalWrite (IN4,LOW);
  Serial.println("TR");
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  lcd.setCursor(1,1);
  lcd.print("Turn Right");
  delay(200);
  
}

  //robot Move Left function
  void turnleft()
{
  digitalWrite(IN1,HIGH);
  digitalWrite(IN2,LOW);
  digitalWrite(IN3,LOW);
  digitalWrite(IN4,HIGH);
  Serial.println("TL");
  lcd.clear();
  lcd.setCursor(3,0);
  lcd.print("Wait Order!");
  lcd.setCursor(2,1);
  lcd.print("Turn Left");
  delay(200);
  
}
void ultrar(){

digitalWrite(trigrPin, LOW);
delayMicroseconds(2);
digitalWrite(trigrPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigrPin, LOW);
durationr = pulseIn(echorPin, HIGH);
distancer = (durationr/2) / 29.1;

Serial.print(distancem);
Serial.println(" cm");
}

void ultram(){

digitalWrite(trigmPin, LOW);
delayMicroseconds(2);
digitalWrite(trigmPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigmPin, LOW);
durationm = pulseIn(echomPin, HIGH);
distancem = (durationm/2) / 29.1;

Serial.print(distancem);
Serial.println(" cm");
}

void ultral(){
digitalWrite(triglPin, LOW);
delayMicroseconds(2);
digitalWrite(triglPin, HIGH);
delayMicroseconds(10);
digitalWrite(triglPin, LOW);
durationl = pulseIn(echolPin, HIGH);
distancel = (durationl/2) / 29.1;

Serial.print(distancel);
Serial.println(" cm");
}
