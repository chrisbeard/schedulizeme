COUNTER=10000
while [ $COUNTER -lt 29000 ]
do
	mv $COUNTER.json $COUNTER.html
	echo $COUNTER
	let COUNTER=COUNTER+1
done

