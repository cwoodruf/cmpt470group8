#!/usr/bin/perl
use FCGI;

while( FCGI::accept() >= 0 )
{
	&populatePostFields;

	$input = $postFields{"input"};
	
	$input =~ tr/agctAGCT/AGCT/cd;	

	$original = $input;

	$input =~ tr/[agctAGCT]/[TCGATCGA]/;
	
	$revcomp = reverse $input; 

    	print( "Content-Type: text/plain", "\n\n" );    	
	print("The cleaned original sequence:", "\n");	
	print ("$original", "\n");
	print( "Here is the reverse complement of your DNA sequence:", "\n");	
	print('-> ', "$revcomp", ' ->', "\n");
    
}


sub populatePostFields {

	%postFields = ();

	read( STDIN, $tmpStr, $ENV{ "CONTENT_LENGTH" } );

	@parts = split( /\&/, $tmpStr );

	foreach $part (@parts) {

		( $name, $value ) = split( /\=/, $part );

		$value =~ ( s/%23/\#/g );

		$value =~ ( s/%2F/\//g );

		$postFields{ "$name" } = $value;

	}

}
