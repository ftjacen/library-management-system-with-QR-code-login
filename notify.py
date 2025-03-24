import mysql.connector
from datetime import datetime, timedelta
import smtplib
from email.mime.text import MIMEText
import schedule
import time
import textwrap

# Configuration
DB_HOST = "localhost"
DB_USER = "Jacen"
DB_PASSWORD = "Ljx@051021"
DB_NAME = "buku_db"
SMTP_SERVER = 'smtp.gmail.com'
SMTP_PORT = 587
SENDER_EMAIL = 'jacen8239@gmail.com'
APP_PASSWORD = 'yybr qhfc cqjs znis' 

# Connect to the MySQL database
def connect_to_db():
    try:
        connection = mysql.connector.connect(
            host=DB_HOST,
            user=DB_USER,
            password=DB_PASSWORD,
            database=DB_NAME
        )
        print("Database connection established.")
        return connection
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return None

# Function to get students with due books
def get_due_students(cursor):
    due_date_threshold = datetime.now() + timedelta(days=1)
    due_date_str = due_date_threshold.strftime('%Y-%m-%d')
    print(f"Checking for due books before: {due_date_str}")  # Debug output
    cursor.execute("SELECT email, tajuk_buku, tarikh_pemulang FROM rekod_pinjaman WHERE tarikh_pemulang <= %s", (due_date_str,))
    results = cursor.fetchall()
    print(f"Due students found: {results}")  # Debug output
    return results

# Function to send email
def send_email(recipient, subject, body):
    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['From'] = SENDER_EMAIL
    msg['To'] = recipient

    try:
        with smtplib.SMTP(SMTP_SERVER, SMTP_PORT) as server:
            server.starttls()
            server.login(SENDER_EMAIL, APP_PASSWORD)
            server.send_message(msg)
            print(f"Email sent to {recipient}.")
    except Exception as e:
        print(f"Failed to send email to {recipient}: {e}")

# Function to notify students
def notify_due_students():
    conn = connect_to_db()
    if conn is None:
        return  # Exit if the database connection failed
    
    cursor = conn.cursor()
    try:
        due_students = get_due_students(cursor)
        for email, title, due_date in due_students:
            # Format the due date for the email
            due_date_formatted = due_date.strftime('%d-%m-%Y')  # Ensure due_date is a datetime object
            # Updated email message
            subject = 'Peringatan: Tarikh Pulangan Buku'
            body = textwrap.dedent(f"""
            Kepada Pelajar Yang Dihormati,

            Ini adalah peringatan bahawa buku bertajuk "{title}" yang anda pinjam dari Perpustakaan Messi perlu dikembalikan pada atau sebelum tarikh ({due_date_formatted}).

            Sila pastikan anda memulangkan buku tepat pada masanya untuk mengelakkan sebarang denda. Jika anda memerlukan bantuan lanjut atau ingin memperbaharui tempoh pinjaman, sila hubungi pihak perpustakaan melalui emel ini atau kunjungi perpustakaan kami.

            Terima kasih atas kerjasama anda.

            Yang benar,
            Moderator, Perpustakaan Messi
            """)

            send_email(email, subject, body)
        
        if due_students:  # Send a summary email if there are due books
            summary_subject = "Daily Reminder Summary"
            summary_body = f"{len(due_students)} reminder(s) sent for due books."
            send_email(SENDER_EMAIL, summary_subject, summary_body)
    finally:
        cursor.close()
        conn.close()

# Schedule the task
print("Running the notify_due_students function...")
schedule.every().minute.do(notify_due_students)
print("Finished running notify_due_students function.")

# Keep the script running
print("Scheduler is running...")
while True:
    try:
        schedule.run_pending()
        time.sleep(60)  # Check every minute
    except Exception as e:
        print(f"An error occurred in the scheduler: {e}")

import mysql.connector
from datetime import datetime, timedelta
import smtplib
from email.mime.text import MIMEText
import schedule
import time
import textwrap

# Configuration
DB_HOST = "localhost"
DB_USER = "Jacen"
DB_PASSWORD = "Ljx@051021"
DB_NAME = "buku_db"
SMTP_SERVER = 'smtp.gmail.com'
SMTP_PORT = 587
SENDER_EMAIL = 'jacen8239@gmail.com'
APP_PASSWORD = 'ohum fcrv fryb mfnt' 

# Connect to the MySQL database
def connect_to_db():
    try:
        connection = mysql.connector.connect(
            host=DB_HOST,
            user=DB_USER,
            password=DB_PASSWORD,
            database=DB_NAME
        )
        print("Database connection established.")
        return connection
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return None

# Function to get students with due books
def get_due_students(cursor):
    due_date_threshold = datetime.now() + timedelta(days=1)
    due_date_str = due_date_threshold.strftime('%Y-%m-%d')
    print(f"Checking for due books before: {due_date_str}")  # Debug output
    cursor.execute("SELECT email, tajuk_buku, tarikh_pemulang FROM rekod_pinjaman WHERE tarikh_pemulang <= %s", (due_date_str,))
    results = cursor.fetchall()
    print(f"Due students found: {results}")  # Debug output
    return results

# Function to send email
def send_email(recipient, subject, body):
    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['From'] = SENDER_EMAIL
    msg['To'] = recipient

    try:
        with smtplib.SMTP(SMTP_SERVER, SMTP_PORT) as server:
            server.starttls()
            server.login(SENDER_EMAIL, APP_PASSWORD)
            server.send_message(msg)
            print(f"Email sent to {recipient}.")
    except Exception as e:
        print(f"Failed to send email to {recipient}: {e}")

# Function to notify students
def notify_due_students():
    conn = connect_to_db()
    if conn is None:
        return  # Exit if the database connection failed
    
    cursor = conn.cursor()
    try:
        due_students = get_due_students(cursor)
        for email, title, due_date in due_students:
            # Format the due date for the email
            due_date_formatted = due_date.strftime('%d-%m-%Y')  # Ensure due_date is a datetime object
            # Updated email message
            subject = 'Peringatan: Tarikh Pulangan Buku'
            body = textwrap.dedent(f"""
            Kepada Pelajar Yang Dihormati,

            Ini adalah peringatan bahawa buku bertajuk "{title}" yang anda pinjam dari Perpustakaan Messi perlu dikembalikan pada atau sebelum tarikh ({due_date_formatted}).

            Sila pastikan anda memulangkan buku tepat pada masanya untuk mengelakkan sebarang denda. Jika anda memerlukan bantuan lanjut atau ingin memperbaharui tempoh pinjaman, sila hubungi pihak perpustakaan melalui emel ini atau kunjungi perpustakaan kami.

            Terima kasih atas kerjasama anda.

            Yang benar,
            Moderator, Perpustakaan Messi
            """)

            send_email(email, subject, body)
        
        if due_students:  # Send a summary email if there are due books
            summary_subject = "Daily Reminder Summary"
            summary_body = f"{len(due_students)} reminder(s) sent for due books."
            send_email(SENDER_EMAIL, summary_subject, summary_body)
    finally:
        cursor.close()
        conn.close()

# Schedule the task
print("Running the notify_due_students function...")
schedule.every().minute.do(notify_due_students)
print("Finished running notify_due_students function.")

# Keep the script running
print("Scheduler is running...")
while True:
    try:
        schedule.run_pending()
        time.sleep(60)  # Check every minute
    except Exception as e:
        print(f"An error occurred in the scheduler: {e}")

