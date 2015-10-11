/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.*;
public class datt{
	
	public  static void main(String [] org ){
            int total=0;
     int diadeingreso;
     int mesdeingreso;
     int añodeingreso;
		Scanner sc=new Scanner(System.in);
		String nombre, placa,vehiculo,bicicleta,horadeingreso;
		//int diadeingreso,mesdeingreso,añodeingreso;
		//int []registro=new int[1000];
		//int[] cpnsultar=new int[1000];
		registro reg;
		registro []arr=new registro[1000];
		int op=0;
			do{
                            
System.out.println("total"+total);
			System.out.println("1. INGRESO DEL USUARIO ");
			System.out.println("2. SALIDA DEL USUARIO ");
			System.out.println("3. CONSULTA DEL USUARIO ");
			System.out.println("4. MODIFICAR DEL USUARIO ");
			System.out.println("5. SALIR ");
		
					
	      System.out.print("digite su opcion ");
			op=sc.nextInt();
			switch(op){
				
				case 1:
                                    
                                    System.out.println("1. Con placa ");
			System.out.println("2. sin placa ");
			System.out.println("3. REGREsAr ");
		
					
	      System.out.print("digite su opcion ");
			op=sc.nextInt();
                        
                        switch(op)
                        {
                            case 1:
                                System.out.println(" placa   ");
					placa=sc.nextLine();
					System.out.println(" nombre  ");
				       nombre=sc.nextLine();
				
					System.out.println(" dia de ingreso  ");
					diadeingreso=sc.nextInt();
					System.out.println(" mes de infreso  ");
					mesdeingreso=sc.nextInt();
					System.out.println(" año de ingreso  ");
					añodeingreso=sc.nextInt();
					System.out.println(" hora de ingreso  ");
					horadeingreso=sc.nextLine();

					reg=new registro();
					reg.placa=placa;
					reg.nombre=nombre;
					reg.diadeingreso=diadeingreso;
reg.mesdeingreso=mesdeingreso;
reg.añodeingreso=añodeingreso;
reg.horadeingreso=horadeingreso;
arr[total]=reg;
total++;
                               break;
                            case 2:
					placa=sc.nextLine();
					System.out.println(" nombre  ");
				       nombre=sc.nextLine();
				
					System.out.println(" dia de ingreso  ");
					diadeingreso=sc.nextInt();
					System.out.println(" mes de infreso  ");
					mesdeingreso=sc.nextInt();
					System.out.println(" año de ingreso  ");
					añodeingreso=sc.nextInt();
					System.out.println(" hora de ingreso  ");
					horadeingreso=sc.nextLine();
                                        reg=new registro();
					reg.placa=placa;
					reg.nombre=nombre;
					reg.diadeingreso=diadeingreso;
reg.mesdeingreso=mesdeingreso;
reg.añodeingreso=añodeingreso;
reg.horadeingreso=horadeingreso;
                               break;
                             case 3:
                                op=0;
                               break;
                             default:
                                 System.out.println(" opcion no valida  ");
                                 break;
                        }
                                    
				      	
					case 2:
					break;
                                        case 3:
                                        break;
                                        case 4:
                                        break;
                                        case 5:
                                            System.out.println(" ADIOS");
                                        break;
                                        default:
                                            
					System.out.println(" opcion no valida  ");
                                 break;	
				
					}}while(op!=5);
				

}}

