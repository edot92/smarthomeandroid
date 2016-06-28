void ambilStatusTombolWeb(){
  // if you get a connection, report back via serial:
  if (client.connect(server, 80)) {
    Serial.println("connected");
    // Make a HTTP request:
    client.println("GET /ambilStatusTombolWeb.php HTTP/1.1");
    client.println("Host: wahyuhidayatusoleh.pe.hu");
       client.println("User-Agent: arduino-ethernet");
    client.println("Connection: close");
    client.println();
  }
  else {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  }
