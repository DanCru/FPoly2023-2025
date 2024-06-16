#include <stdio.h>
#include <string.h>
#include "thuvien.h"
int n;
struct SinhVien{
	char name[30];
	char mssv[10];
	float hocluc;
};
typedef struct SinhVien SV;

void Nhap()
{
	printf("Nhap so luong sinh vien: ");
	scanf("%d", &n);
	getchar();
}
SV tt[20];
void ttsv(){
	for(int i = 0; i < n; i++) {
    printf("\nMoi nhap ten: ");
    gets(tt[i].name);
    printf("Ma so sinh vien: ");
    scanf("%s", &tt[i].mssv);
    
    printf("Diem trung binh mon: ");
    scanf("%f", &tt[i].hocluc);
    getchar();
    }
}

void sapxep(){
	
    	SV temp;
    for(int i = 0; i < n; i++){
  	    for(int j = 0; j < n - 1; j++){
  		    if(tt[i].hocluc > tt[j].hocluc) {
  			    temp = tt[i];
                tt[i] = tt[j];
                tt[j] = temp;
		    }
	    }
    }
    printf("\nThu tu cua sinh vien xet theo DTB la:\n");
    for(int i = 0; i < n; i++){
  	printf("%s", tt[i].name);
  	if(tt[i].hocluc >= 9) printf(" Hoc luc xuat sac");
	else if(tt[i].hocluc >= 8) printf(" Gioi");
	else if(tt[i].hocluc >= 6.5) printf(" Kha");
    else if(tt[i].hocluc >= 5) printf(" Trung binh");
	else printf(" Yeu");
	printf("\n");
  } 
}

void timkiem(){
	SV tk[n+1];
    printf("\n[Tim kiem sinh vien theo ten va ma sinh vien]\n");
	printf("Nhap ten sinh vien: ");

	gets(tk[0].name);
	printf("\nNhap ma so cua sinh vien: ");
	gets(tk[0].mssv);
	printf("%s %s\n", tk[0].name, tk[0].mssv);
	int check = 0;
	for(int i = 0; i < n; i++){
	  	if(strcmp(tk[0].name, tt[i].name) == 0 && strcmp(tk[0].mssv, tt[i].mssv) == 0 ){
	  		printf("Ten: %s\n", tt[i].name);
	  		printf("Hoc luc: %.1f\n", tt[i].hocluc);
	  		check = 1;
		}
		
    }
    if (check == 0)
    	printf("Ban da nhap sai thong tin! Vui long nhap lai.");
}