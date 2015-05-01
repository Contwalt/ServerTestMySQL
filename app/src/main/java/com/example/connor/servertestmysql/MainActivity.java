package com.example.connor.servertestmysql;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;


public class MainActivity extends ActionBarActivity {

    //Button btnViewAccounts;
    Button btnNewAccount;
    Button btnUploadImage;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Buttons
        //btnViewAccounts = (Button) findViewById(R.id.btnViewProducts);
        btnNewAccount = (Button) findViewById(R.id.btnCreateProduct);
        btnUploadImage = (Button) findViewById(R.id.btnUploadImage);

        // view products click event
        /*btnViewAccounts.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                // Launching All products Activity
                Intent i = new Intent(getApplicationContext(), ViewRow.class);
                startActivity(i);

            }
        }); */

        // Upload image click event
        btnUploadImage.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                // Launch image upload activity
                Intent i = new Intent(getApplicationContext(), UploadToServer.class);
                startActivity(i);
            }
        });

        // add account click event
        btnNewAccount.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                // Launching create new account activity
                Intent i = new Intent(getApplicationContext(), AddNewRow.class);
                startActivity(i);

            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
