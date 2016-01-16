package tp4;


public class Port {
	private String nom;
	private final int capacite=3;//taille physique
	private float taxe;
	private Barque t[];
	private int nbB;//taille logique
	
public Port(String nom,float taxe){
	this.nom=nom;
	this.taxe=taxe;
	t=new Barque[capacite];
	nbB=0;
}
public void entree(Barque b){
	try {
		if(nbB<t.length)//capacite
			t[nbB++]=b;
		else 
			throw new MesExceptions("Port Plein");
	} catch (MesExceptions e) 
	{
	
		System.out.println(e.getMessage());
		
	}
	finally
	{
	
	System.out.println("Apres Catch");
	}
}
	
public void sortie(Barque b) throws MesExceptions{
	int i=0;
	try {
		while(i<nbB  && ! t[i].equals(b))
		{
			i++;
		if(i<nbB)
		{
			for(int j=i;j<nbB-1;j++)
				t[j]=t[j+1];
			t[nbB-1]=null;
			nbB--;
		}
		else
		{
		    throw new MesExceptions("Barque : "+b+" Inexistant");
		}
		
		}
	}
finally
	{
	System.out.println("Apres Catch");
	}
}
public String toString(){
	String s="nom:"+nom+"   capacite"+capacite+"     taxe:"+taxe;
	for(int i=0;i<nbB;i++)
		s+="\n"+t[i];//.toString()
	return s;
}

public float recette(){
	float r=0;
	for(int i=0;i<nbB;i++)
		if( t[i] instanceof BarqueMoteur)
			if((( BarqueMoteur)t[i]).getPuissance()<5)
				r+=taxe*1.1f;
			else
				r+=taxe*1.2f;
		else 
			r+=taxe;
	return r;
}
public static void main(String []args){
	Barque b=new Barque("acr",123);
	BarqueMoteur bm=new BarqueMoteur("azerty",678,4);
	BarqueMoteur bm2=new BarqueMoteur("rfb",234,6);
	BarqueMoteur bm1=new BarqueMoteur("rfb",234,6);
	Port p=new Port("Marina",1300);
	p.entree(b);
	p.entree(bm);
	p.entree(bm2);
	System.out.println(p);
	System.out.println("la recette est "+p.recette());
	
	
	try {
	    p.sortie(bm);
		p.sortie(bm1);
	} catch (MesExceptions e) {
	
		System.out.println(e.getMessage());
	}
	finally
	{
	p.entree(bm1);
	System.out.println("Apres Catch");
	}
}
}
