// init pin
int pinOut[8]={14,15,16,17,18,19,20};
int pinAdc=A0;
#include <EEPROM.h>
#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
char server[] = "wahyuhidayatusoleh.pe.hu";    
IPAddress ip(192, 168, 137, 100);
EthernetClient client;

void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(9600);

initPinGPIO();
  while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }

  // start the Ethernet connection:
//  if (Ethernet.begin(mac) == 0) {
//    Serial.println("Failed to configure Ethernet using DHCP");
//    // no point in carrying on, so do nothing forevermore:
//    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
//  }
  // give the Ethernet shield a second to initialize:
  delay(4000);
  Serial.println("connecting...");


}

void loop()
{ 
  ambilStatusTombolWeb();
  kirimSuhuWeb();
}

