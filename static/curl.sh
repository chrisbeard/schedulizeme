COUNTER=10000
while [ $COUNTER -lt 29000 ]
do
	curl http://trump6.com/schedulizeme/legacyapi/crn.php?crn=$COUNTER -o $COUNTER.json
	echo $COUNTER
	let COUNTER=COUNTER+1
done

