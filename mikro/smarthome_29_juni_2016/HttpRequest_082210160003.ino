


// constants won't change :
const long intervalAmbilweb = 5000;
char dataWeb[100];
int cntDataWeb;
bool ambilDataWeb;
void ambilStatusTombolWeb() {
  // if you get a connection, report back via serial:
  if (client.connect(server, 80)) {
    Serial.println("connected");
    // Make a HTTP request:
    client.println("GET /ambilStatusTombolWeb HTTP/1.1");
    client.println("Host: wahyuhidayatusoleh.pe.hu");
    client.println("User-Agent: arduino-ethernet");
    client.println("Connection: close");
    client.println();

    memset(dataWeb, 0, 100);
    ambilDataWeb = false;
    unsigned long  a = 0;
    bool okekkkkkk = false;
    cntDataWeb = 0;
    while ( okekkkkkk == false && a < intervalAmbilweb) { //>5000
      a++;
      delay(1);
      while (client.available() > 0) {

        char c = client.read();

        if (c == '(' && ambilDataWeb == false) {
          ambilDataWeb = true;
        };
        if (ambilDataWeb == true && okekkkkkk == false) {
          if ( c != '(' && c != ')') {

            dataWeb[cntDataWeb] = c;
            cntDataWeb++;
          } else if ( c == ')') {
            okekkkkkk = true;
          }
        }
      }
    }
    if (ambilDataWeb == true) {
      ambilDataWeb = false;
      cntDataWeb = 0;
      Serial.println();
      Serial.println(dataWeb);
      prosesPin(String(dataWeb));
      memset(dataWeb, 0, 100);

    }
  }
  else {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed");
  }


  client.flush();
  client.stop();

}
float random_;
void kirimSuhuWeb()
{
  char get[100] = "GET /kirimSuhuWeb?suhu=";
  char http[10] = " HTTP/1.1";
  char strSend[80];
  char suhu[6];


  random_ = random(30.1, 50.4);
  //4 is mininum width, 3 is precision; float value is copied onto buff
  dtostrf(random_, 4, 3, suhu);
  strcat (get, suhu);
  strcat (get, http);


  if (client.connect(server, 80)) {
    Serial.println("connected");
    // Make a HTTP request:
    client.println(get);
    client.println("Host: wahyuhidayatusoleh.pe.hu");
    client.println("User-Agent: arduino-ethernet");
    client.println("Connection: close");
    client.println();
    Serial.print("data to send =");
      Serial.println(get);
    memset(dataWeb, 0, 100);
    ambilDataWeb = false;
    unsigned long  a = 0;
    bool okekkkkkk = false;
    cntDataWeb = 0;
    while ( okekkkkkk == false && a < intervalAmbilweb) { //>5000
      a++;
      delay(1);
      while (client.available() > 0) {

        char c = client.read();

        if (c == '(' && ambilDataWeb == false) {
          ambilDataWeb = true;
        };
        if (ambilDataWeb == true && okekkkkkk == false) {
          if ( c != '(' && c != ')') {

            dataWeb[cntDataWeb] = c;
            cntDataWeb++;
          } else if ( c == ')') {
            okekkkkkk = true;
          }
        }
      }
    }
    if (ambilDataWeb == true) {
      ambilDataWeb = false;
      cntDataWeb = 0;
      Serial.println();
      Serial.println(dataWeb);
      memset(dataWeb, 0, 100);

    }
  }
  else {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed");
  }

  client.flush();
  client.stop();
}

