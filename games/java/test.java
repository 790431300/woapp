import  java.util.*;
import java.text.*;

public class test{
public static void main(String []args) {
System.out.println("hello word\n");
Date dNow = new Date();
SimpleDateFormat ft = new SimpleDateFormat ("yyyy-MM-dd hh:mm:ss");
System.out.println("\ntime:"+ft.format(dNow));
}
}