#include <stdio.h>
#include <stdlib.h>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char *argv[]) {
	printf("++-----------------------------------------------------++\n");
	printf("| Chuc nang 1: Kiem tra so nguyen                       |\n");
	printf("| Chuc nang 2: Tim uoc chung va boi chung cua 2 so      |\n");
	printf("| Chuc nang 3: Tinh tien cho quan KARAOKE               |\n");
	printf("| Chuc nang 4: Tinh tien dien                           |\n");
	printf("| Chuc nang 5: Doi tien                                 |\n");
	printf("| Chuc nang 6: Tinh lai vay ngan hang                   |\n");
	printf("| Chuc nang 7: Vay tien mua xe                          |\n");
	printf("| Chuc nang 8: Sap xep thong tin nhan vien              |\n");
	printf("| Bam 0 de thoat.                                       |\n");
	printf("++-----------------------------------------------------++");
	
	int chuc_nang;
	printf("\nVui long chon chuc nang: ");
	scanf("%d", &chuc_nang);
	switch(chuc_nang){
		case 1:
			kiemtraso();
			break;
		case 2:
		    UC_BC();
			break;
		case 3:
			karaoke();
			break;
		case 4:
			tiendien();
			break;
		case 5:
//			doitien();
			break;
		case 6:
			bank();
			break;
		case 7:
			tragop();
			break;
		case 8:
			Nhap();
			ttsv();
			sapxep();
			timkiem();
			break;
		default:
		    printf("Chung toi khong co chuc nang nay!");
		    break;
	}
	return 0;
}