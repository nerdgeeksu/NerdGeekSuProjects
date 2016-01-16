package tp4;


public class Barque {
private String nom;
private int num;
public Barque(String nom,int num){
	this.nom=nom;
	this.num=num;
}
public String toString()
{
	return "nom"+nom+"   numero auto"+num;
}
public int getNum()
{
	return num;
}
public String getNom()
{
	return nom;
}
}
