void initPinGPIO()
{
  for(int i=0;i<8;i++){
    pinMode(pinOut[i],HIGH);
    }
}
void prosesPin(String myString){
 String str1 = getValue(myString, ',', 0);
 String str2 = getValue(myString, ',', 1);
 String str3 = getValue(myString, ',', 2);
 String str4 = getValue(myString, ',', 3);
 String str5 = getValue(myString, ',', 4);
 String str6 = getValue(myString, ',', 5);
 String str7 = getValue(myString, ',', 6);
digitalWrite(pinOut[0],str1.toInt());
digitalWrite(pinOut[1],str2.toInt());
digitalWrite(pinOut[2],str3.toInt());
digitalWrite(pinOut[3],str4.toInt());
digitalWrite(pinOut[4],str5.toInt());
digitalWrite(pinOut[5],str6.toInt());
digitalWrite(pinOut[6],str7.toInt());
  }
