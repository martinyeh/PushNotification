package com.htc.martin_yeh.gcmclient;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        MagicLenGCM gcmClient = new MagicLenGCM(this);
        MagicLenGCM.GCMState state = gcmClient.startGCM();

        Log.d("MainActivity", state.toString());
    }
}
