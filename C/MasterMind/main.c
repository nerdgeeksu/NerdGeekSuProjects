/* #include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define colors 6
#define combi 4
#define essais 10

unsigned essai[combi], code[combi];

struct score {
    unsigned bien_place;
    unsigned mal_place;
} score;

enum {R, B, J, V, O, N}; // rouge, blue, jaune, vert, orange, noir

// cree le code secret et le enregistrer dans tableau code
void secret_mot(){
    int i;
    srand(time(NULL)); // initialiser le compteur de random
    for(i= 0; i < combi; i++) {
        code[i] = rand() % colors; // random de 0 à max (colors - 1)
        // printf("%d ", code[i]);
    }
    // printf("\n");
}

void saisir_combi() {
    int i;
    char c;
    printf("donner votre combi (R, B, J, V, O, N)\n");
    for(i = 0; i < combi; i++) {
        do {
            printf("%d > ", i);
            scanf("%c", &c);
            fflush(stdin); // supprimer le reste des chars on saisi
            switch(c) {
            case 'R': essai[i] = R; break;
            case 'B': essai[i] = B; break;
            case 'J': essai[i] = J; break;
            case 'V': essai[i] = V; break;
            case 'O': essai[i] = O; break;
            case 'N': essai[i] = N; break;
            default: c = 0; break;
            }
        }while( c == 0);
    }
}

// calcule la bien palce et mal place couleur
void calcule_score() {
    unsigned freq_code[colors] = {0};
    unsigned freq_essai[colors] = {0};
    int i;
    score.mal_place = 0;
    score.bien_place = 0;
    for(i=0; i < combi; i++) // calcue le freq du color en code
        freq_code[code[i]]++;
    for (i = 0; i < combi; i++) {
        freq_essai[essai[i]]++; // calcule le freq du color en essai
        if(essai[i] == code[i]) // si la valeur est bien placé
            score.bien_place++;
        if(freq_essai[essai[i]] <= freq_code[essai[i]])
            score.mal_place++;
    }
    // on calcue les element du tableau puis on supprime le sbien placés
    score.mal_place -= score.bien_place;
    printf("Bien place = %d, mal place = %d\n",
           score.bien_place, score.mal_place);
}
int main() {
    unsigned i;
    while(1) { // repeter le jeu à l'infinit
        printf("\n===> Nouvelle jeu <===\n");
        i = 0;
        secret_mot();// appele à la function de la creation de mot secret
        do {
            saisir_combi();
            calcule_score();
            i++;
        } while(score.bien_place != combi // pas gagne
                && i < essais); // pas depacé le max essai
        if(score.bien_place == combi)
            printf(">>>> tu a gange!! <<<<\n");
        else
            printf(">>>> tu a perdu :( <<<<\n");
        printf("Mot secret : ");
        for(i =0; i < combi; i++)
            switch(code[i]) {
            case R: printf("R "); break;
            case B: printf("B "); break;
            case J: printf("J "); break;
            case V: printf("V "); break;
            case O: printf("O "); break;
            case N: printf("N "); break;
            }
        printf("\n");
    }
    return 0;
}
*/

#include <stdio.h>
#include <stdlib.h>
#include<time.h>

#define maxcombi 2
#define maxcouleurs 4
#define maxessais 4

typedef char mm_combi[maxcombi];
typedef int mm_scores[2];
enum {R,V,B,J,O,M,};
unsigned es,combi;
FILE *fi;

void saisir(){
    do{
        printf("donner le nb d essai \n");
        scanf("%u",&es);
    }while(es>maxessais && es<1);
    do{
        printf("donner le nb d combinaison \n");
        scanf("%u",&combi);
    }while(combi >maxcombi|| combi <1);
    fflush(stdin);
}

void init_combi_remise( mm_combi la_combi)
{
    int i;
    fi=fopen("secret.txt","w+");
    srand(time(0));
    for(i=0;i<combi;i++)
    {
        la_combi[i]=rand()%combi;
        fprintf(fi,"%d\n",la_combi[i]);
    }
    fclose(fi);
}

void lire_essai(mm_combi essai)
{
    int i; char inter;

    for(i=0;i<combi;i++)
      {
        do {
            printf("donner la caractere numero %d : ",i);
            scanf(" %c",&inter);
            fflush(stdin);

            switch(inter)
                {
                    case 'R':essai[i]=R;break;
                    case 'V':essai[i]=V;break;
                    case 'B':essai[i]=B;break;
                    case 'J':essai[i]=J;break;
                    case 'O':essai[i]=O;break;
                    case 'M':essai[i]=M;break;
                    default: inter = 0; break;
                }

        } while (inter == 0);
       }
}
void teste_combi(mm_combi la_combi,mm_combi essai, int score[])
{

          int i,k;
          score[1]= 0;
          score[0] = 0;
    for(i=0; i<combi ;i++)
       {

            if (essai[i] == la_combi[i])
            {
                    score[0]++;
             }
        for(k=0;k<combi;k++) //parcour de essai
          {
            if (essai[k] == la_combi[i] && essai[k] !=la_combi[k])
              {
                score[1]++;
              }
          }
        }


           printf("\nbien place=%d\n",score[0]);
            printf("\nmal place=%d\n",score[1]);

        }

 void test_final(int score[],mm_combi la_combi, int j) //  j = nombre d'essai
 {
        int i;
     if(j>maxessais && score[0] != maxcombi)
        {
          printf("Vous avez perdu");
          printf("\nLa bonne combinaison etait:");

        for(i=0;i<combi;i++)
           {

              switch(la_combi[i])
                {
                    case R:printf("R");break;
                    case V:printf("V");break;
                    case B:printf("B");break;
                    case J:printf("J");break;
                    case O:printf("O");break;
                    case M:printf("M");break;
                }
            }

            printf("\n"); // afficher la ligne de combinaison car sans CE printf ca n'affiche pas
         }
      if(score[0] == combi)
            {
                    printf("bravo !!!\nbravo !!!\n Vous avez gagne\n");
            }

}

int main()
{
            int score[2]={0,0}; int i=0;
            mm_combi essai ; mm_combi la_combi ;
        saisir();
        init_combi_remise(la_combi);
        while(1)// boucle infinie pour rejouer
        {
                printf("Nouvelle tentative \n");
            do
            {
                lire_essai(essai);
                teste_combi(la_combi,essai,score);
                i++;
            }
            while((i<maxessais)&&(score[0]!=maxcombi)); // si il passe le maxessais ou il a le succé
        test_final(score,la_combi,i);
        }
	return 0;
}





