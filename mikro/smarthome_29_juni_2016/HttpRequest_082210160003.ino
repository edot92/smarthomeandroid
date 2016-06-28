


// constants won't change :
const long intervalAmbilweb = 5000;   
char dataWeb[100];
int cntDataWeb;
bool ambilDataWeb;      
void ambilStatusTombolWeb(){
  // if you get a connection, report back via serial:
  if (client.connect(server, 80)) {
    Serial.println("connected");
    // Make a HTTP request:
    client.println("GET /ambilStatusTombolWeb HTTP/1.1");
    client.println("Host: wahyuhidayatusoleh.pe.hu");
       client.println("User-Agent: arduino-ethernet");
    client.println("Connection: close");
    client.println();
  }
  else {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed");
  }
 
   memset(dataWeb,0,100);
  ambilDataWeb==false;
  int a=0;
  while( ambilDataWeb==false && a<1000){//>5000
  a++;
  delay(1);
  while (client.available()>0) {
    
    char c = client.read();
     Serial.print(c);
    if(c=='('){ambilDataWeb=true;};
    if(ambilDataWeb==true && c!='(' || c!=')'){
    dataWeb[cntDataWeb]=c;
    cntDataWeb++;
    }
  }
  }
  if(ambilDataWeb==true){
    ambilDataWeb=false;
    cntDataWeb=0;
     Serial.println();
     Serial.println(dataWeb);
    memset(dataWeb,0,100);
    
    }

    client.stop();

  }
