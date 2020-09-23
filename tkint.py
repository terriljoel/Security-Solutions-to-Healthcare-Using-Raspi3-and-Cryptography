from tkinter import *
from tkinter import messagebox
#from tkinter.ttk import *
from PIL import ImageTk,Image
import pymysql
from pymysql import Error
import sys
import dec123
import enc123
import Adafruit_DHT
import time

class Frames(object):

    def __init__(self):
        pass

    def main_frame(self):

        root=Tk()
        height1 = root.winfo_screenheight()

        # getting screen's width in pixels
        width1 = root.winfo_screenwidth()
        root.title('Login')
        root.geometry("%dx%d"%(width1,height1))
        self.img = Image.open("/home/pi/project/b.jpg")
        self.img = self.img.resize((width1, height1), Image.ANTIALIAS)
        self.img = ImageTk.PhotoImage(self.img)

        l =Label(root, image=self.img, width=width1,height=height1).place(x=0,y=height1*.15)
        self.img1 = Image.open("/home/pi/project/a.jpeg")
        self.img1 = self.img1.resize((500, 300), Image.ANTIALIAS)
        self.img1= ImageTk.PhotoImage(self.img1)
        l1 = Label(root, image=self.img1, width=500, height=300).place(x=.3*width1, y=.3*height1)
        l3 = Label(root, text="PHYSICAL EXAMINATION PORTAL", font=("Times New Roman", 45)).place(x=.1 * width1,
                                                                                                 y=.0 * height1)
        l2 = Label(root, text="Staff Login", font=("Times New Roman", 25)).place(x=.5 * width1, y=.35 * height1)
        usernameLabel = Label(root, text="Usename:", font=("Times New Roman", 20)).place(x=.39*width1, y=.45*height1)
        passwordLabel = Label(root, text="Password:", font=("Times New Roman", 20)).place(x=.39*width1, y=.5*height1)
        username = StringVar()
        userEntry = Entry(root, textvariable=username).place(x=.5*width1, y=.45*height1, width=150, height=30)
        password = StringVar()
        passwordEntry = Entry(root, textvariable=password, show='*').place(x=.5*width1, y=.5*height1, width=150, height=30)

        loginButton = Button(root, text="Login", command=lambda : self.login(root,username,password)).place(x=.5*width1, y=.55*height1,width=150, height=30)

        root.mainloop()



    def login(self,root,username,password):
        db = pymysql.connect("localhost", "root", "root123", "Healthcare")
        c= db.cursor()
        sql = "select username, password from users where username='%s' and password='%s' and designation=0;" % (username.get(), password.get())
        print(password.get())
        try:
            c.execute(sql)
            dt = c.fetchall()
            if len(dt) == 0:
                #self.loginB['state']==tk.DISABLED
                messagebox.showinfo("Error", "Invalid username or password")
            else:
                root.destroy()
                print("hello worlds")
                self.result_frame()
        except:
            messagebox.showerror("Error", "Error occured")
            db.close()

    def logout(self,root):
        root.destroy()
        self.main_frame()

    def result_frame(self):

        root=Tk()
        height1 = root.winfo_screenheight()

        # getting screen's width in pixels
        width1 = root.winfo_screenwidth()
        root.title("HomePage")
        root.geometry("%dx%d" % (width1, height1))
        self.img = Image.open("/home/pi/project/b.jpg")
        self.img = self.img.resize((width1, height1), Image.ANTIALIAS)
        self.img = ImageTk.PhotoImage(self.img)
        l = Label(root, image=self.img, width=width1, height=height1).place(x=0, y=height1 * .15)
        self.img1 = Image.open("/home/pi/project/a.jpeg")
        self.img1 = self.img1.resize((500, 300), Image.ANTIALIAS)
        self.img1 = ImageTk.PhotoImage(self.img1)
        l3 = Label(root, text="PHYSICAL EXAMINATION PORTAL", font=("Times New Roman", 45)).place(x=.1 * width1,
                                                                                                 y=.0 * height1)
        l1 = Label(root, image=self.img1, width=500, height=300).place(x=.3 * width1, y=.3 * height1)
        usernameLabel = Label(root, text="Enter the patient Id", font=("Times New Roman", 20)).place(x=.41*width1,
                                                                                                        y=.4*height1)
        patient_id = StringVar()
        userEntry = Entry(root, textvariable=patient_id).place(x=.44*width1, y=.47*height1, width=150, height=30)
        Find = Button(root, text="Search", command=lambda: self.search(root,patient_id)).place(x=.44*width1,
                                                                                                      y=.55*height1,
                                                                                                      width=150,
                                                                                                      height=30)
        Find1 = Button(root, text="Logout", command=lambda: self.logout(root)).place(x=.85*width1,  y=.15*height1,
                                                                                                        width=150,
                                                                                                        height=30)

        root.mainloop()
    def search(self,root,patient_id):
        db = pymysql.connect("localhost", "root", "root123", "Healthcare")
        c= db.cursor()
        sql = "select * from patients where id=%d" % (int(patient_id.get()))
        try:
            c.execute(sql)
            dt = c.fetchall()
            if len(dt) == 0:
                #self.loginB['state']==tk.DISABLED
                messagebox.showinfo("Error", "Patient information not found")
            else:
                pid=int(patient_id.get())
                root.destroy()
                print("hello worlds")
                self.third_frame(pid)
        except:
            messagebox.showerror("Error", "Error occured")
            db.close()




    def third_frame(self,pid):
        root=Tk();
        height1 = root.winfo_screenheight()

        # getting screen's width in pixels
        width1 = root.winfo_screenwidth()
        root.title("Patient Information")
        root.geometry("%dx%d" % (width1, height1))
        self.img = Image.open("/home/pi/project/b.jpg")
        self.img = self.img.resize((width1, height1), Image.ANTIALIAS)
        self.img = ImageTk.PhotoImage(self.img)
        l = Label(root, image=self.img, width=width1, height=height1).place(x=0, y=height1 * .1)
        self.img1 = Image.open("/home/pi/project/a.jpeg")
        self.img1 = self.img1.resize((500, 600), Image.ANTIALIAS)
        self.img1 = ImageTk.PhotoImage(self.img1)
        l1 = Label(root, image=self.img1, width=500, height=600).place(x=.08 * width1, y=.11 * height1)
        l2 = Label(root, image=self.img1, width=500, height=600).place(x=.55 * width1, y=.11 * height1)
        l3 = Label(root, text="PHYSICAL EXAMINATION PORTAL", font=("Times New Roman", 40)).place(x=.08 * width1,
                                                                                                 y=.0 * height1)
        usernameLabel = Label(root, text="PATIENT DETAILS", font=("Times New Roman", 25)).place(x=.17*width1,

                                                                                        y=.13*height1)
        u11=StringVar()
        u12 = StringVar()
        u13 = StringVar()
        u14 = StringVar()
        u15 = StringVar()
        u16 = StringVar()

        u1 = Label(root, text="Patient Id: 100", textvariable=u11, font=("Times New Roman", 20)).place(x=.2*width1, y=.23*height1)
        u2 = Label(root, text="First Name: Yathi", textvariable=u12,font=("Times New Roman", 20)).place(x=.2*width1, y=.33*height1)
        u3 = Label(root, text="Last Name: S", textvariable=u13,font=("Times New Roman", 20)).place(x=.2*width1, y=.43*height1)
        u4 = Label(root, text="Age: 21 ", textvariable=u14,font=("Times New Roman", 20)).place(x=.2*width1, y=.53*height1)
        u5 = Label(root, text="Sex: Male",textvariable=u15, font=("Times New Roman", 20)).place(x=.2*width1, y=.63*height1)
        u6 = Label(root, text="Blood Group: B+",textvariable=u16, font=("Times New Roman", 20)).place(x=.2*width1, y=.73*height1)

        self.body_temp = StringVar()
        self.ecg = StringVar()
        self.heart_rate = StringVar()
        u7 = Label(root, text="READINGS", font=("Times New Roman", 25)).place(x=.65*width1, y=.13*height1)
        u8 = Label(root, text="Body Temp.", font=("Times New Roman", 15)).place(x=.68*width1, y=.23*height1)
        ue1 = Label(root, textvariable=self.body_temp,font=("Times New Roman", 15)).place(x=.66*width1, y=.3*height1)
        check1 = Button(root, text="Check", command=lambda: self.body_tempa(self.body_temp)).place(x=.8*width1, y=.3*height1)
        self.body_temp.set("----")
        u9 = Label(root, text="Heart Rate", font=("Times New Roman", 15)).place(x=.68*width1, y=.40*height1)
        ue2 = Label(root, textvariable=self.heart_rate,font=("Times New Roman", 15)).place(x=.66*width1, y=.47*height1 )
        check2 = Button(root, text="Check", command=lambda: self.Heart_rate(self.heart_rate) ).place(x=.8*width1, y=.47*height1)
        self.heart_rate.set("----")
        u10 = Label(root, text="ECG", font=("Times New Roman", 15)).place(x=.68*width1, y=.57*height1)
        ue3 = Entry(root, textvariable=self.ecg).place(x=.66*width1, y=.64*height1, width=150, height=30)
        check3 = Button(root, text="Check").place(x=.8*width1, y=.64*height1)
        self.ecg.set("----")
        submit = Button(root, text="Submit", command=self.submitr).place(x=.67*width1,
                                                                                                        y=.74*height1,
                                                                                                        width=150,
                                                                                                        height=30)

        back = Button(root, text="back", command=lambda :self.prev(root)).place(x=.85*width1,
                                                                                                    y=.01*height1,
                                                                                                    width=150,
                                                                                                    height=30)
        Find = Button(root, text="Logout", command=lambda: self.logout(root)).place(x=.85*width1,
                                                                                                        y=.05*height1,
                                                                                                        width=150,
                                                                                                        height=30)


        db = pymysql.connect("localhost", "root", "root123", "Healthcare")
        c= db.cursor()
        c1=db.cursor()
        sql = "select * from patients where id=%d" % (pid)
        sql1="select * from scanned_data where id=%d"%(pid)
        self.f=0
        self.e=0
        self.fnm=""
        self.do_b=""
        self.add=""
        self.pid=pid
        self.root=root
        try:
            c.execute(sql)
            c1.execute(sql1)
            dt1=c1.fetchall()
            dt = c.fetchall()
            print(dt)
            if len(dt) == 0:
                #self.loginB['state']==tk.DISABLED
                messagebox.showinfo("Error", "Patient information not found")
            else:
                add=""
                for row in dt:
                    u11.set("Patient Id: "+str(row[0]))
                    u12.set("First name: "+row[1])
                    u13.set("Last name: "+row[3])
                    u14.set("DOB : "+row[8])
                    u15.set("Sex : "+row[4])
                    u16.set("Blood Group : "+row[7])
                    add=row[12]
                    fnm=row[1]
                    do_b=row[8]
                self.fnm=fnm
                self.do_b=do_b
                self.add=add

                if len(dt1)!=0:
                    self.f=1

                    for row1 in dt1:
                        bdt=row1[2]
                        del sys.modules["dec123"]
                        import dec123
                        hrate=dec123.decryption123(add,do_b,fnm,row1[2])
                        self.heart_rate.set(hrate)
                        del sys.modules["dec123"]
                        import dec123
                        bdt=dec123.decryption123(add,do_b,fnm,row1[1])
                        self.body_temp.set(bdt)
                        db.close()

        except:
            messagebox.showerror("Error", "Error occured")
            db.close()



        root.mainloop()
    def prev(self,root):
        root.destroy()
        self.result_frame()

    def submitr(self):
        print(self.f,self.fnm,self.do_b,self.add)

        db = pymysql.connect("localhost", "root", "root123", "Healthcare")
        c= db.cursor()
        del sys.modules["enc123"]
        import enc123
        ht=enc123.decryption123(self.add,self.do_b,self.fnm,self.heart_rate.get())
        del sys.modules["enc123"]
        import enc123
        bd=enc123.decryption123(self.add,self.do_b,self.fnm,self.body_temp.get())
        del sys.modules["enc123"]
        import enc123
        ec=enc123.decryption123(self.add,self.do_b,self.fnm,self.ecg.get())
        print(ht,ec,bd)
        sql = "insert into scanned_data values(%d,'%s','%s','%s')" % (self.pid,bd,ht,ec)
        sql1="update scanned_data set bodytemp='%s',heartrate='%s',ecg='%s' where id=%d"%(bd,ht,ec,self.pid)
        if self.f==1 and self.body_temp.get()!="--":
            if self.e==1:
                try:
                    c.execute(sql1)
                    db.commit()
                    messagebox.showinfo("Success", "Successfully updated")
                except:
                    messagebox.showerror("Error", "Error occured")
                    db.close()
                self.prev(self.root)
            else:
                messagebox.showinfo("Message", "Please update the readings")
        elif self.e==1 and self.body_temp.get()!="--":
            try:
                c.execute(sql)
                db.commit()
                messagebox.showinfo("Success", "Successfully submitted")
            except:
                messagebox.showerror("Error", "Error occured")
                db.close()
            self.prev(self.root)
        else:
            messagebox.showerror("Error", "check the readings")



    def body_tempa(self,body_temp):
        self.body_temp.set("--")
        self.e=1
        DHT_SENSOR= Adafruit_DHT.DHT11
        DHT_PIN=4
        i=0
        t=""
        while i<1:
            humidity,temperature=Adafruit_DHT.read(DHT_SENSOR,DHT_PIN)
            if humidity is not None and temperature is not None:
                t=temperature
                i=i+1
            else:
                messagebox.showerror("Error", "Check wiring")

            time.sleep(1)
        self.body_temp.set(str(t)+" C")


    def Heart_rate(self,body_temp):
        self.heart_rate.set("--")
        self.e=1
        import heartrate
        messagebox.showinfo("Note","Please keep ur finger on the sensor atleast for 5-10 seconds")
        ht=heartrate.read_heartrate()
        if(int(ht)<30 or int(ht)>135):
            messagebox.showerror("Error","Please try again or check the sensor")
        else:
            self.heart_rate.set(str(ht)+" BPM")




app = Frames()
app.main_frame()
#app.third_frame(1011)