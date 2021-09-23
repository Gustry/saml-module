;<?php die(''); ?>
;for security reasons , don't remove or modify the first line

driver=saml

;============ Parameters for the plugin
; session variable name
session_name=JELIX_USER

; Says if there is a check on the ip address : verify if the ip
; is the same when the user has been connected
secure_with_ip=0

;Timeout. After the given time (in minutes) without activity, the user is disconnected.
; If the value is 0 : no timeout
timeout=30


; set to 'on' to destroy the session on logout
session_destroy=on

; If the value is "on", the user must be authentificated for all actions, except those
; for which a plugin parameter  auth.required is false
; If the value is "off", the authentification is not required for all actions, except those
; for which a plugin parameter  auth.required is true
auth_required=on

; What to do if an authentification is required but the user is not authentificated
; 1 = generate an error. This value should be set for web services (xmlrpc, jsonrpc...)
; 2 = redirect to an action
on_error=2

; locale key for the error message when on_error=1
error_message="saml~auth.notlogged"

; action to execute on a missing authentification when on_error=2
;on_error_action = "saml~auth:notauthenticated"
on_error_action="jauth~login:out"

; action to execute on a missing authentification when on_error=2 and request is ajax
on_ajax_error_action=

; action to execute when a bad ip is checked with secure_with_ip=1 and on_error=2
bad_ip_action="jauth~login:out"


;=========== Parameters for jauth module

; number of second to wait after a bad authentification.
; deprecated. Not recommended to use it, as it eases a DDOS attack
on_error_sleep=0

; action to redirect after the login
after_login="app~default:index"

; action to redirect after a logout
after_logout="jauth~login:form"

; says if after_login can be overloaded by a "auth_url_return" parameter in the url/form for the login
enable_after_login_override=on

; says if after_logout can be overloaded by a "auth_url_return" parameter in the url/form for the login
enable_after_logout_override=on

; list of domains allowed for url indicated into auth_url_return.
; should be a string for a single domain
url_return_external_allowed_domains=
; or a list like that:
;url_return_external_allowed_domains[]=

;============ Parameters for the persistance of the authentification

; enable the persistance of the authentification between two sessions
persistant_enable=off

; key to use to crypt the password in the cookie
; Warning: has been moved to liveconfig.ini.php, section coordplugin_auth
;persistant_crypt_key=

; the name of the cookie which is used to store data for the authentification
persistant_cookie_name=jauthSession

; duration of the validity of the cookie (in days). default is 1 day.
persistant_duration=1

;=========== parameters for password hashing

; method of the hash. 0 or "" means old hashing behavior of jAuth
; (using password_* parameters in drivers ).
; Prefer to choose 1, which is the default hash method (bcrypt).
password_hash_method=

; options for the hash method. list of "name:value" separated by a ";"
password_hash_options=



;------- parameters for the "saml" driver
[saml]
compatiblewithdb=on

; name of the dao to get user data
dao="jauthdb~jelixuser"

; profile to use for jDb 
profile=

; name of the form for the jauthdb_admin module
form="jauthdb_admin~jelixuser"

; path of the directory where to store files uploaded by the form (jauthdb_admin module)
; should be related to the var directory of the application
uploadsDirectory=

; value "on": create the user in the database if it doesn't exist when the user is authenticated
automaticAccountCreation=on

; other parameters for SAML service provider and identity provider are
; into saml:* sections into the main configuration.


