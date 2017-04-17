import csv, sys
import io
import unicodedata
csv.register_dialect(
    'mydialect',
    delimiter = '\t',
    quotechar = '"',
    doublequote = True,
    skipinitialspace = True,
    lineterminator = '\r',
    quoting = csv.QUOTE_MINIMAL)
# filename = sys.argv[1]
csvfiler1 = open("books-csv.tsv", 'r')
# csvfiler2 = open("borrowers.csv", 'r')
csvreader1 = csv.reader(csvfiler1,delimiter="\t")
# csvreader2 = csv.reader(csvfiler2)
rows = []
author_id = 1
csvfile1 = open('book.tsv', 'w')
csvfile2 = open('book_authors.tsv','w')
csvfile3 = open('authors.tsv', 'w')
# csvfile4 = open('borrower.csv', 'w')
# csvfile5 = open('book_loans.csv', 'w')
# for row in csvreader2:
	# thedatawriter = csv.writer(csvfile4, dialect='mydialect')
	# thedatawriter.writerow((row[1],row[2]))
	# thedatawriter = csv.writer(csvfile5, dialect='mydialect')
	# thedatawriter.writerow((row[1],row[2]))
i=0
for row in csvreader1:
	# print row
# for row in csvreader:
  # try:
      # row['Title'].decode('ascii')
      # rows.append(row['Title']) 
  # except UnicodeDecodeError:
      # pass	  
	thedatawriter = csv.writer(csvfile3, dialect='mydialect')
	thedatawriter.writerow((author_id,row[2]))  
	if  i==0:	
		thedatawriter = csv.writer(csvfile1, dialect='mydialect')
		thedatawriter.writerow((row[0],row[1]))

		thedatawriter = csv.writer(csvfile2, dialect='mydialect')
		thedatawriter.writerow((author_id,row[0]))
		i+=1
		prev_isbn = row[0]
		prev_title = row[1]
	else:
		if row[0] != prev_isbn and row[1] != prev_title:
			thedatawriter = csv.writer(csvfile1, dialect='mydialect')
			thedatawriter.writerow((row[0],row[1]))

		thedatawriter = csv.writer(csvfile2, dialect='mydialect')
		if row[0]==prev_isbn:
			thedatawriter.writerow((author_id,prev_isbn))
		else:	
			thedatawriter.writerow((author_id,row[0]))	
		
	author_id = author_id + 1