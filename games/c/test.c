#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <arpa/inet.h>
#include <sys/socket.h>
#include <pthread.h>
#define BUF_SIZE 1024
#define SMALL_BUF 100
int flag = 0;
void* request_hander(void *arg);
void* content_type(char* file);
void send_error(FILE* fp);
void send_data(FILE* fp,char* ct, char* file_name);
void error_hander(char *message);
int main(int argc, char *argv[])
{
   int serv_sock,clnt_sock;
   struct sockaddr_in serv_addr,clnt_addr;
   socklen_t clt_sz = sizeof(clnt_addr);
   char buf[BUF_SIZE];
   pthread_t id_t;
   if(argc != 2)
   {
       printf("Usage : %s <port>\n",argv[0]); exit(1);
   }
   serv_sock = socket(PF_INET,SOCK_STREAM,0);
   memset(&serv_addr,0,sizeof(serv_addr));
   serv_addr.sin_family = AF_INET;
   serv_addr.sin_port = htons(atoi(argv[1]));
   serv_addr.sin_addr.s_addr = htonl(INADDR_ANY);
   if(bind(serv_sock,(struct sockaddr*)&serv_addr,sizeof(serv_addr)) == -1)
       error_hander("bind() error!");
   if(listen(serv_sock,20) == -1)
       error_hander("listen() error");
   while (1)
   {
       clnt_sock = accept(serv_sock,(struct sockaddr*)&clnt_addr,&clt_sz);
       printf("connection Request: %s:%d\n",inet_ntoa(clnt_addr.sin_addr),ntohs(clnt_addr.sin_port));
       pthread_create(&id_t,NULL,request_hander,&clnt_sock);
       pthread_detach(id_t);
   }
   close(serv_sock);
   return 0;
}
void* request_hander(void *arg)
{
    printf("进入 request_hander\n");
    int clnt_sock = *((int *)arg);
    char req_line[SMALL_BUF];
    FILE* clnt_read;
    FILE* clnt_write;

    char method[10];
    char ct[15];
    char file_name[30];

    clnt_read = fdopen(clnt_sock,"r");
    clnt_write = fdopen(dup(clnt_sock),"w");
    fgets(req_line,SMALL_BUF,clnt_read);
    printf("req_line= %s\n",req_line);
    if(strstr(req_line,"HTTP/") == NULL)
    {
        printf("mei you HTTP/\n");
        send_error(clnt_write);
        fclose(clnt_read);
        fclose(clnt_write);
        return ;
    }
    strcpy(method,strtok(req_line," /"));
    strcpy(file_name,strtok(NULL," /"));
    strcpy(ct,content_type(file_name));
    if(strcmp(method,"GET") != 0)
    {
        printf("mei you GET!\n");
        send_error(clnt_write);
        fclose(clnt_read);
        fclose(clnt_write);
        return ;
    }
    fclose(clnt_read);
    printf("filename= %s\n",file_name);
    send_data(clnt_write,ct,file_name);
}
void* content_type(char* file)
{
    char extension[SMALL_BUF];
    char file_name[SMALL_BUF];
    strcpy(file_name,file);
    strtok(file_name,".");
    strcpy(extension,strtok(NULL,"."));
    if( strcmp(extension,"html")==0 || strcmp(extension,"htm")==0 )
        return "text/html";
    return "text/plain";
}
void send_error(FILE* fp)
{
    printf("进入 send_error!\n");
    char protocol[] = "HTTP/1.0 400 Bad Request\r\n";
    char server[] = "Server: linux Web Server \r\n";
    char cnt_len[] = "Content-length:2048\r\n";
    char cnt_type[] = "content-type: text/html\r\n\r\n";
    char content[] = "<html> <head><title>NETWORK</title></head><body><font size=+5><br>error!!!</font></body></html>";
    fputs(protocol,fp);
    fputs(server,fp);
    fputs(cnt_type,fp);
    fputs(cnt_len,fp);
   fputs(content,fp);
    fflush(fp); // qing chu huan cun
}
void send_data(FILE* fp,char* ct, char* file_name)
{
    printf("进入send_data()\n");
    char protocol[] = "HTTP/1.0 200 OK\r\n";
    char server[] = "server: linux Web Server lian\r\n";
    char cnt_len[] = "Content-length: 2048\r\n";
    char cnt_type[SMALL_BUF];
    char buf[BUF_SIZE];
    FILE* send_file;
    sprintf(cnt_type,"Content-type:%s\r\n\r\n",ct);
    send_file = fopen(file_name,"r");
    if(send_file == NULL)
    {
        printf("wai cao\n");
        send_error(fp); return ;
    }
    fputs(protocol,fp);
    fputs(server,fp);
    fputs(cnt_len,fp);
    fputs(cnt_type,fp);
    while (fgets(buf,BUF_SIZE,send_file) != NULL)
    {
        printf("send_data wait()\n");
        fputs(buf,stdout);
        fputs(buf,fp);
        fflush(fp);
    }
    fflush(fp);
    fclose(fp);
}

void error_hander(char *message)
{
    fputs(message,stderr);
    fputc('\n',stderr);
    exit(1);
}
