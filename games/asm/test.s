.WO:
.ascii	"hello word"//要打印的文字
.text
.align	2
.global	main
main:
stmfd sp!, {fp, lr}
add fp, sp, #4
ldr r0, .L1
bl printf
mov r0,r3
ldmfd sp!,{fp, pc}
.L3:.align 2
.L1:.word .WO
.section .note.GNU-stack,"",%progbits

