#include<stdio.h>
int main()
{
FILE *fp;
fp = fopen("test.txt","w");
fprintf(fp,"%s","hello wo");
fclose(fp);
printf("创建text.txt文件，并写入hello wo成功");
return 0;
}