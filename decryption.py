import sys
import FeistelBlockCipher as f
final_list = []
"""def add_to_final(final,k):
    for i in range(0,4):
        final.append(k[i])"""


def lfsr(temp):
    for i in range(0, 4):
        xor1 = temp[0] ^ temp[3]
        temp[0] = temp[1]
        temp[1] = temp[2]
        temp[2] = temp[3]
        temp[3] = xor1
    final_list.append(temp)  # append after lfsr


def shuffle(k):
    binary_list = []
    for i in range(0, len(k)):
        x = k[i]
        binr = bin(x).replace("0b", "")  # convert to binary
        if ((len(binr)) < 4):
            zero_to_add = 4 - len(binr)
            for j in range(0, zero_to_add):
                binary_list.append(0)
        for j in range(0, len(binr)):
            binary_list.append(int(binr[j]))
    for i in range(0, 32, 4):  # for each 4 bit value do lfsr
        temp = []
        temp.append(binary_list[i])
        temp.append(binary_list[i + 1])
        temp.append(binary_list[i + 2])
        temp.append(binary_list[i + 3])
        lfsr(temp)


#print("Enter 12 digit aadhar number ")
num = []
#for i in range(0, 12):
#    num.append(input())

num = list(sys.argv[1])
# num=[8,1,4,5,3,0,5,6,0,6,4,5]
key = []
# dob="05-10-1990"
#dob = input("Enter the dob")
dob= sys.argv[2]
final_list = []
# print("name")
# fname="YATHI"
fname= sys.argv[3]
fname = fname.upper()
#fname = input("Enter the first name")
ch1 = fname[0]

# num=[1,2,3,4,5,6,7,8,9,0,1,2]
ch2 = fname[-1]

key.append(ch1)  # first character of first name
key.append(int(dob[0]))  # first digit of dob
for i in num:
    key.append(i)  # append aadhar number

key.append(ch2)  # last character of first name
key.append(int(dob[1]))  # second digit of dob
'''
print("step1- convert all characters to ascii")
print(key)'''

# convert to ascii values n store in as_list

as_list = []
for i in key:
    ch = ord(str(i))
    as_list.append(ch)
    # split(ch,as_list)
'''print("ascii list")
print(as_list)'''

# convert ascii into hex and store in hex list
hex_list = []

for i in as_list:
    hex_list.append((hex(i).replace("0x", "")))

'''print("step 2- convert ascii to hexadecimal and split")
print(hex_list)'''

if (hex_list[0].isalnum()):
    hex_list[0] = '00'
if (hex_list[14].isalnum()):
    hex_list[14] = '99'

split_list = []
for i in hex_list:
    split_list.append(int(i[0]))
    split_list.append(int(i[1]))
'''print("splitted list")
print(split_list)'''

l = []
i = 0

for i in range(0, 4):
    l.append(split_list[i])
    l.append(split_list[i + 4])
    l.append(split_list[i + 8])
    l.append(split_list[i + 12])
    l.append(split_list[i + 16])
    l.append(split_list[i + 20])
    l.append(split_list[i + 24])
    l.append(split_list[i + 28])
#print("step 3 - shuffle")
#print(l)

k1 = l[0:8]  # split into 4 list
k2 = l[8:16]
k3 = l[16:24]
k4 = l[24:32]

#print("split into 4 list")
#print(k1, k2, k3, k4)

# new binary list
bin_list1 = []
bin_list2 = []
bin_list3 = []
bin_list4 = []

shuffle(k1)
shuffle(k2)
shuffle(k3)
shuffle(k4)

'''print("step 4- convert to binary and apply lfsr")
print(final_list)'''
# print(len(final_list))
str1 = ""
flag = True

#print("step 5- convert to decimal and shuffle k1 & k2 and k3 &k4")


def bin_to_decimal(li, k):  # binary to decimal
    str1 = ""
    for i in li:
        str1 = str1 + str(i)
    dec = int(str1, 2)
    dec = str(dec)
    if (len(dec) > 1):  # store only 1 digit from 2 digits alternatively
        if (flag):
            dec = int(dec[0])
        else:
            dec = int(dec[1])
    dec = int(dec)

    k.append(dec)


k5 = []
k6 = []
k7 = []
k8 = []

k = 0
for i in final_list:
    flag = not (flag)
    if (k < 8):
        bin_to_decimal(i, k5)
    elif (k < 16):
        bin_to_decimal(i, k6)
    elif (k < 24):
        bin_to_decimal(i, k7)
    else:
        bin_to_decimal(i, k8)
    k = k + 1
'''print("k1,k2,k3,k4")
print(k6, k5, k8, k7)'''

"""final_list1=[]

for i in range(0,8):
    final_list1.append(k6[i])
for i in range(0,8):
    final_list1.append(k5[i])
for i in range(0,8):
    final_list1.append(k8[i])
for i in range(0,8):
    final_list1.append(k7[i])

print("Final of final list")
print(final_list1)
final_key=""
for i in range(0,32):
    final_key+=str(final_list1[i])
print(final_key)
"""


def appendtolist(k9, k, i):
    k9.append(k[i])


k9 = []

appendtolist(k9, k6, 0)
appendtolist(k9, k6, 7)
appendtolist(k9, k5, 0)
appendtolist(k9, k5, 7)
appendtolist(k9, k8, 0)
appendtolist(k9, k8, 7)
appendtolist(k9, k7, 0)
appendtolist(k9, k7, 7)
'''print("K5")
print(k9)'''

def list_to_string(li):
    str1=""
    for i in li:
        str1+=str(i)
    return str1

key1=list_to_string(k6)
key2=list_to_string(k5)
key3=list_to_string(k8)
key4=list_to_string(k7)
key5=list_to_string(k9)
# print("-------------CRYPTO--------------")
# print("k1 k2 k3 k4 k5")
# print(key1+" "+key2+" "+key3+" "+key4+" "+key5)


message = sys.argv[4]
keys = [key1,key2,key3,key4,key5]

crypto = f.FeistelBlockCipher()


keys = [key1,key2,key3,key4,key5]
# encoded_message = "8392cefb63d7a06763ac72c1724d29ed32d4838a216a33551468cfb4"
decoded = crypto.decode_message(message, keys)

print(decoded)
