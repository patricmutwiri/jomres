
<
?
p
h
p

/
*
*

 
*
 
C
o
r
e
 
f
i
l
e
.

 
*

 
*
 
@
a
u
t
h
o
r
 
V
i
n
c
e
 
W
o
o
l
l
 
<
s
a
l
e
s
@
j
o
m
r
e
s
.
n
e
t
>

 
*

 
*
 
@
v
e
r
s
i
o
n
 
J
o
m
r
e
s
 
9
.
1
0
.
0
-
c
h
a
r
l
i
e

 
*

 
*
 
@
c
o
p
y
r
i
g
h
t
	
2
0
0
5
-
2
0
1
8
 
V
i
n
c
e
 
W
o
o
l
l

 
*
 
J
o
m
r
e
s
 
(
t
m
)
 
P
H
P
,
 
C
S
S
 
&
 
J
a
v
a
s
c
r
i
p
t
 
f
i
l
e
s
 
a
r
e
 
r
e
l
e
a
s
e
d
 
u
n
d
e
r
 
b
o
t
h
 
M
I
T
 
a
n
d
 
G
P
L
2
 
l
i
c
e
n
s
e
s
.
 
T
h
i
s
 
m
e
a
n
s
 
t
h
a
t
 
y
o
u
 
c
a
n
 
c
h
o
o
s
e
 
t
h
e
 
l
i
c
e
n
s
e
 
t
h
a
t
 
b
e
s
t
 
s
u
i
t
s
 
y
o
u
r
 
p
r
o
j
e
c
t
,
 
a
n
d
 
u
s
e
 
i
t
 
a
c
c
o
r
d
i
n
g
l
y

 
*
*
/


/
/
 
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#

d
e
f
i
n
e
d
(
'
_
J
O
M
R
E
S
_
I
N
I
T
C
H
E
C
K
'
)
 
o
r
 
d
i
e
(
'
'
)
;

/
/
 
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#
#


c
l
a
s
s
 
j
9
9
9
9
9
l
i
v
e
_
s
c
r
o
l
l
i
n
g
_
j
a
v
a
s
c
r
i
p
t

{

 
 
 
 
p
u
b
l
i
c
 
f
u
n
c
t
i
o
n
 
_
_
c
o
n
s
t
r
u
c
t
(
$
c
o
m
p
o
n
e
n
t
A
r
g
s
)

 
 
 
 
{

 
 
 
 
 
 
 
 
$
M
i
n
i
C
o
m
p
o
n
e
n
t
s
 
=
 
j
o
m
r
e
s
_
s
i
n
g
l
e
t
o
n
_
a
b
s
t
r
a
c
t
:
:
g
e
t
I
n
s
t
a
n
c
e
(
'
m
c
H
a
n
d
l
e
r
'
)
;

 
 
 
 
 
 
 
 
i
f
 
(
$
M
i
n
i
C
o
m
p
o
n
e
n
t
s
-
>
t
e
m
p
l
a
t
e
_
t
o
u
c
h
)
 
{

 
 
 
 
 
 
 
 
 
 
 
 
$
t
h
i
s
-
>
t
e
m
p
l
a
t
e
_
t
o
u
c
h
a
b
l
e
 
=
 
f
a
l
s
e
;


 
 
 
 
 
 
 
 
 
 
 
 
r
e
t
u
r
n
;

 
 
 
 
 
 
 
 
}


 
 
 
 
 
 
 
 
i
f
 
(
A
J
A
X
C
A
L
L
)
 
{

 
 
 
 
 
 
 
 
 
 
 
 
$
e
n
d
r
u
n
_
j
a
v
a
s
c
r
i
p
t
_
f
o
r
_
e
v
a
l
_
b
y
_
l
i
v
e
_
s
c
r
o
l
l
i
n
g
 
=
 
g
e
t
_
s
h
o
w
t
i
m
e
(
'
e
n
d
r
u
n
_
j
a
v
a
s
c
r
i
p
t
_
f
o
r
_
e
v
a
l
_
b
y
_
l
i
v
e
_
s
c
r
o
l
l
i
n
g
'
)
;


 
 
 
 
 
 
 
 
 
 
 
 
i
f
 
(
!
e
m
p
t
y
(
$
e
n
d
r
u
n
_
j
a
v
a
s
c
r
i
p
t
_
f
o
r
_
e
v
a
l
_
b
y
_
l
i
v
e
_
s
c
r
o
l
l
i
n
g
)
 
&
&
 
g
e
t
_
s
h
o
w
t
i
m
e
(
'
t
a
s
k
'
)
 
=
=
 
'
a
j
a
x
_
l
i
s
t
_
p
r
o
p
e
r
t
i
e
s
'
)
 
{

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
$
j
a
v
a
s
c
r
i
p
t
 
=
 
'
^
'
;


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
f
o
r
e
a
c
h
 
(
$
e
n
d
r
u
n
_
j
a
v
a
s
c
r
i
p
t
_
f
o
r
_
e
v
a
l
_
b
y
_
l
i
v
e
_
s
c
r
o
l
l
i
n
g
 
a
s
 
$
j
s
)
 
{

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
$
j
a
v
a
s
c
r
i
p
t
 
.
=
 
$
j
s
;

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
}

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
e
c
h
o
 
$
j
a
v
a
s
c
r
i
p
t
;

 
 
 
 
 
 
 
 
 
 
 
 
}

 
 
 
 
 
 
 
 
}

 
 
 
 
}


 
 
 
 
p
u
b
l
i
c
 
f
u
n
c
t
i
o
n
 
g
e
t
R
e
t
V
a
l
s
(
)

 
 
 
 
{

 
 
 
 
 
 
 
 
r
e
t
u
r
n
 
n
u
l
l
;

 
 
 
 
}

}

